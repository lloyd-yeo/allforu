<?php

namespace App\Http\Controllers\Admin;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSchoolsRequest;
use App\Http\Requests\Admin\UpdateSchoolsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class SchoolsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of School.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('school_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('school_delete')) {
                return abort(401);
            }
            $schools = School::onlyTrashed()->get();
        } else {
            $schools = School::all();
        }

        return view('admin.schools.index', compact('schools'));
    }

    /**
     * Show the form for creating new School.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('school_create')) {
            return abort(401);
        }
        return view('admin.schools.create');
    }

    /**
     * Store a newly created School in storage.
     *
     * @param  \App\Http\Requests\StoreSchoolsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSchoolsRequest $request)
    {
        if (! Gate::allows('school_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $school = School::create($request->all());



        return redirect()->route('admin.schools.index');
    }


    /**
     * Show the form for editing School.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('school_edit')) {
            return abort(401);
        }
        $school = School::findOrFail($id);

        return view('admin.schools.edit', compact('school'));
    }

    /**
     * Update School in storage.
     *
     * @param  \App\Http\Requests\UpdateSchoolsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSchoolsRequest $request, $id)
    {
        if (! Gate::allows('school_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $school = School::findOrFail($id);
        $school->update($request->all());



        return redirect()->route('admin.schools.index');
    }


    /**
     * Display School.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('school_view')) {
            return abort(401);
        }
        $clubs = \App\Club::where('school_id', $id)->get();

        $school = School::findOrFail($id);

        return view('admin.schools.show', compact('school', 'clubs'));
    }


    /**
     * Remove School from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('school_delete')) {
            return abort(401);
        }
        $school = School::findOrFail($id);
        $school->delete();

        return redirect()->route('admin.schools.index');
    }

    /**
     * Delete all selected School at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('school_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = School::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore School from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('school_delete')) {
            return abort(401);
        }
        $school = School::onlyTrashed()->findOrFail($id);
        $school->restore();

        return redirect()->route('admin.schools.index');
    }

    /**
     * Permanently delete School from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('school_delete')) {
            return abort(401);
        }
        $school = School::onlyTrashed()->findOrFail($id);
        $school->forceDelete();

        return redirect()->route('admin.schools.index');
    }
}
