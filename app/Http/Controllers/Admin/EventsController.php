<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Club;
use App\News;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventsRequest;
use App\Http\Requests\Admin\UpdateEventsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Overtrue\LaravelFollow\FollowRelation;
use Carbon\Carbon;

class EventsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Club.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->student_leader != 1) {
            return redirect()->back();
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('club_delete')) {
                return abort(401);
            }
            $events = Event::onlyTrashed()->get();
        } else {
            if (Auth::user()->club_id != NULL) {
                $events = Event::where('club_id', Auth::user()->club_id)->get();
            } else {
                $events = collect();
            }
        }

        $referred_by = array(['Facebook', 'Instagram', 'Linkedin', 'Friend’s referral', 'Referred by other clubs', 'Internet search',
            'Flyers', 'Events']);
        $society_classification = array(['Club', 'CCA', 'Interest Group', 'Hall']);
        $society_category = array(['Sports', 'Hall of residence', 'Performing arts', 'Voluntary role','Student welfare',
            'Academic']);

        return view('admin.events.index', compact('events','referred_by','society_classification','society_category'));
    }

    /**
     * Show the form for creating new Club.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = \App\Club::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $referred_by = collect(['Facebook', 'Instagram', 'Linkedin', 'Friend’s referral', 'Referred by other clubs', 'Internet search',
            'Flyers', 'Events']);
        $society_classification = collect(['Club', 'CCA', 'Interest Group', 'Hall']);
        $society_category = collect(['Sports', 'Hall of residence', 'Performing arts', 'Voluntary role','Student welfare',
            'Academic']);
        $public = collect([ 1 => "Yes", 0 => "No"]);

        return view('admin.events.create', compact('clubs','referred_by','society_classification','society_category','public'));
    }

    /**
     * Store a newly created Event in storage.
     *
     * @param  \App\Http\Requests\StoreEventsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventsRequest $request)
    {
        $request = $this->saveFiles($request);
        $event = Event::create($request->all());

        foreach ($request->input('images_id', []) as $index => $id) {
            $model          = config('laravel-medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $event->id;
            $file->save();
        }

        return redirect()->route('admin.events.index');
    }


    /**
     * Show the form for editing Club.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clubs = \App\Club::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $event = Event::findOrFail($id);

        return view('admin.events.edit', compact('event', 'clubs'));
    }

    /**
     * Update Club in storage.
     *
     * @param  \App\Http\Requests\UpdateEventsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventsRequest $request, $id)
    {
        if (! Gate::allows('club_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $event = Event::findOrFail($id);
        $event->update($request->all());
        
        $media = [];
        foreach ($request->input('images_id', []) as $index => $id) {
            $model          = config('laravel-medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $event->id;
            $file->save();
            $media[] = $file->toArray();
        }
        $event->updateMedia($media, 'images');

        return redirect()->route('admin.event.index');
    }


    /**
     * Display Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('club_view')) {
            return abort(401);
        }

        $schools = \App\School::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $event = Event::findOrFail($id);
        $users = $event->subscribers;
        $user_auth_codes = array();

        foreach ($users as $user) {
            $auth_code = NULL;
            $relation = FollowRelation::where('user_id', $user->id)
                ->where('followable_id', $event->id)
                ->where('relation', 'subscribe')
                ->first();
            if ($relation != NULL) {
                $auth_code = Carbon::parse($relation->created_at)->getTimestamp();
                $auth_code = substr($auth_code, -4);
                $user_auth_codes[$user->id] = $relation;
                $relation->auth_code = $auth_code;
                $relation->save();
            }
        }

        return view('admin.events.show', compact('event', 'users', 'user_auth_codes'));
    }


    /**
     * Remove Club from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('club_delete')) {
            return abort(401);
        }
        $club = Club::findOrFail($id);
        $club->deletePreservingMedia();

        return redirect()->route('admin.clubs.index');
    }

    /**
     * Delete all selected Club at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('club_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Club::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->deletePreservingMedia();
            }
        }
    }


    /**
     * Restore Club from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('club_delete')) {
            return abort(401);
        }
        $club = Club::onlyTrashed()->findOrFail($id);
        $club->restore();

        return redirect()->route('admin.clubs.index');
    }

    /**
     * Permanently delete Club from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('club_delete')) {
            return abort(401);
        }
        $club = Club::onlyTrashed()->findOrFail($id);
        $club->forceDelete();

        return redirect()->route('admin.clubs.index');
    }

    public function event_confirm_attendance($request) {

        if ($request->input('event_id') && $request->input('auth_code') && $request->input('user_id')) {
            $relation = FollowRelation::where('user_id', $request->input('user_id'))
                ->where('followable_id', $request->input('event_id'))
                ->where('relation', 'subscribe')
                ->first();

            if ($relation != NULL) {
                if ($relation->auth_code == $request->input('auth_code')) {
                    $relation->status == 1;
                    $relation->save();

                    return response()->json(['success' => TRUE, 'message' => 'This attendee\'s attendance has been successfully approved.']);
                } else {
                    return response()->json(['success' => TRUE, 'message' => 'Auth Code is incorrect.']);
                }
            }
        } else {
            return abort(404);
        }
    }
}
