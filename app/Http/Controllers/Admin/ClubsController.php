<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Club;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClubsRequest;
use App\Http\Requests\Admin\UpdateClubsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Log;

class ClubsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Club.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id != NULL
            && Auth::user()->student_leader == 1
            && (Auth::user()->role_id == 1 || Auth::user()->role_id == 3 || Auth::user()->role_id == 4)) {
            if (! Gate::allows('club_access')) {
                return abort(401);
            }

            if (request('show_deleted') == 1) {
                if (! Gate::allows('club_delete')) {
                    return abort(401);
                }
                $clubs = Club::onlyTrashed()->get();
            } else {
                if (Auth::user()->club_id != NULL) {
                    Log::info(Auth::user());
                    $clubs = Club::where('id', Auth::user()->club_id)->get();
                    if (count($clubs) < 1) {
                        return redirect()->action('Admin\ClubsController@create');
                    }
                } else {
                    $clubs = collect();
                }
            }

            $referred_by = ['Facebook', 'Instagram', 'Linkedin', 'Friend’s referral', 'Referred by other clubs', 'Internet search',
                'Flyers', 'Events'];
            $society_classification = ['Club', 'CCA', 'Interest Group', 'Hall'];
            $society_category = ['Sports', 'Hall of residence', 'Performing arts', 'Voluntary role','Student welfare',
                'Academic'];

            return view('admin.clubs.index', compact('clubs','referred_by','society_classification','society_category'));
        } else {
            return redirect()->action('HomeController@dashboard');
        }
    }

    /**
     * Show the form for creating new Club.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('club_create')) {
            return abort(401);
        }

        $schools = \App\School::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $referred_by = collect(['Facebook', 'Instagram', 'Linkedin', 'Friend’s referral', 'Referred by other clubs', 'Internet search',
            'Flyers', 'Events']);
        $society_classification = collect(['Club', 'CCA', 'Interest Group', 'Hall']);
        $society_category = collect(['Sports', 'Hall of residence', 'Performing arts', 'Voluntary role','Student welfare',
            'Academic']);

        return view('admin.clubs.create', compact('schools','referred_by','society_classification','society_category'));
    }

    /**
     * Store a newly created Club in storage.
     *
     * @param  \App\Http\Requests\StoreClubsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClubsRequest $request)
    {
        if (! Gate::allows('club_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $club = Club::create($request->all());

        if (Auth::user()) {
            if (Auth::user()->club_id == NULL && Auth::user()->student_leader == 1) {
                $user = User::find(Auth::user()->id);
                $user->club_id = $club->id;
                $user->save();
                $club->president_id = $user->id;
                $club->save();
            }
        }

        $news_1 = new News;
        $news_1->order = 1;
        $news_1->description = $request->input('news_1');
        $news_1->club_id = $club->id;
        $news_1->save();

        $news_2 = new News;
        $news_2->order = 2;
        $news_2->description = $request->input('news_2');
        $news_2->club_id = $club->id;
        $news_2->save();

        $news_3 = new News;
        $news_3->order = 3;
        $news_3->description = $request->input('news_3');
        $news_3->club_id = $club->id;
        $news_3->save();

        foreach ($request->input('images_id', []) as $index => $id) {
            $model          = config('laravel-medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $club->id;
            $file->save();
        }

        return redirect()->route('admin.clubs.index');
    }


    /**
     * Show the form for editing Club.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('club_edit')) {
            return abort(401);
        }

        $schools = \App\School::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $club = Club::findOrFail($id);

        return view('admin.clubs.edit', compact('club', 'schools'));
    }

    /**
     * Update Club in storage.
     *
     * @param  \App\Http\Requests\UpdateClubsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClubsRequest $request, $id)
    {
        if (! Gate::allows('club_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $club = Club::findOrFail($id);
        $club->update($request->all());


        $media = [];
        foreach ($request->input('images_id', []) as $index => $id) {
            $model          = config('laravel-medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $club->id;
            $file->save();
            $media[] = $file->toArray();
        }
        $club->updateMedia($media, 'images');

        return redirect()->route('admin.clubs.index');
    }


    /**
     * Display Club.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('club_view')) {
            return abort(401);
        }

        $schools = \App\School::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$users = \App\User::whereHas('clubs',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();

        $club = Club::findOrFail($id);

        return view('admin.clubs.show', compact('club', 'users'));
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
}
