<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Job;
use Illuminate\Http\Request;
use Session;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $job = Job::where('name', 'LIKE', "%$keyword%")
				->orWhere('number', 'LIKE', "%$keyword%")
				->orWhere('expiration_date', 'LIKE', "%$keyword%")
				->orWhere('work_time', 'LIKE', "%$keyword%")
				->orWhere('public', 'LIKE', "%$keyword%")
				->orWhere('description', 'LIKE', "%$keyword%")
				->orWhere('required', 'LIKE', "%$keyword%")
				->orWhere('benefit', 'LIKE', "%$keyword%")
				->orWhere('city', 'LIKE', "%$keyword%")
				->orWhere('district', 'LIKE', "%$keyword%")
				->orWhere('position', 'LIKE', "%$keyword%")
				->orWhere('experience', 'LIKE', "%$keyword%")
				->orWhere('work_type', 'LIKE', "%$keyword%")
				->orWhere('job_type', 'LIKE', "%$keyword%")
				->orWhere('salary', 'LIKE', "%$keyword%")
				->orWhere('gender', 'LIKE', "%$keyword%")
				->orWhere('age', 'LIKE', "%$keyword%")
				->orWhere('company', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $job = Job::paginate($perPage);
        }

        return view('job.index', compact('job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'company' => 'required'
		]);
        $requestData = $request->all();
        
        Job::create($requestData);

        Session::flash('flash_message', 'Job added!');

        return redirect('admin/job');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);

        return view('job.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);

        return view('job.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'company' => 'required'
		]);
        $requestData = $request->all();
        
        $job = Job::findOrFail($id);
        $job->update($requestData);

        Session::flash('flash_message', 'Job updated!');

        return redirect('admin/job');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Job::destroy($id);

        Session::flash('flash_message', 'Job deleted!');

        return redirect('admin/job');
    }
}
