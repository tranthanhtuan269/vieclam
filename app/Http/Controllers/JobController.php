<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Job;
use App\Company;
use App\Apply;
use Illuminate\Http\Request;
use Session;
use Auth;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function createJob() {
        // $jobTypes = 
        // companysizes = 
        // cities = 
        return view('job.create_job');
    }

    public function storeJob(Request $request) {
        // $validator = Validator::make($request->all(), [
        //     'tieu_de' => 'required|max:255',
        // ]);
        // if ($validator->fails()) {
        //     return redirect('tinbds/create')
        //             ->withErrors($validator)
        //             ->withInput();
        // }
        // dd($request->all());

        $input = $request->all();
        if ($input['description'] == null)
            $input['description'] = '';
        if ($input['requirement'] == null)
            $input['requirement'] = '';
        if ($input['benefit'] == null)
            $input['benefit'] = '';
        if ($input['number'] == null)
            $input['number'] = 1;
        if ($input['expiration_date'] == null)
            $input['expiration_date'] = date("Y-m-d H:i:s");
        if (isset($input['job_type']) || $input['job_type'] == null)
            $input['job_type'] = 'Làm bán thời gian;';
        if (isset($input['work_type']) || $input['work_type'] == null)
            $input['work_type'] = 0;
        $input['work_time'] = date("Y-m-d H:i:s");
        $input['created_at'] = date("Y-m-d H:i:s");
        $input['updated_at'] = date("Y-m-d H:i:s");
        $current_id = \Auth::user()->id;

        // check followed
        $company = Company::where('user', $current_id)->select('id')->first();
        if($company){
            $input['company'] = $company->id;
        }else{
            $input['company'] = 0;
        }
        
        $job = Job::create($input);

        if ($job) {
            return redirect()->action(
                    'JobController@info', ['id' => $job->id]
                );
        }

        return redirect()->back();
    }

    public function info($id){
        $job = \DB::table('jobs')
                ->join('cities', 'cities.id', '=', 'jobs.city')
                ->join('districts', 'districts.id', '=', 'jobs.district')
                ->join('salaries', 'salaries.id', '=', 'jobs.salary')
                ->select(
                        'jobs.id',
                        'jobs.name',
                        'cities.name as city', 
                        'districts.name as district', 
                        'jobs.description',
                        'jobs.required',
                        'jobs.benefit',
                        'jobs.number',
                        'jobs.company',
                        'jobs.expiration_date',
                        'jobs.gender',
                        'salaries.name as salary'

                )
                ->where('jobs.id', $id)
                ->first();
        if($job && $job->company){
            $company = \DB::table('companies')
                ->join('cities', 'cities.id', '=', 'companies.city')
                ->join('districts', 'districts.id', '=', 'companies.district')
                ->join('towns', 'towns.id', '=', 'companies.town')
                ->join('company_sizes', 'company_sizes.id', '=', 'companies.size')
                ->select(
                        'companies.id', 
                        'companies.name', 
                        'companies.logo', 
                        'companies.address', 
                        'cities.name as city', 
                        'districts.name as district', 
                        'towns.name as town', 
                        'companies.jobs', 
                        'company_sizes.size as size', 
                        'companies.sologan', 
                        'companies.description',
                        'companies.images'
                )
                ->where('companies.id', $id)
                ->first();
        }
        return view('job.info', compact('job', 'company'));
    }

    public function join(Request $request){
        if(!Auth::check()){
            return \Response::json(array('code' => '401', 'message' => 'Unauthorized!'));
        }
        $current_id = Auth::user()->id;
        if(isset($request->job) && $request->job > 0){
            $exitApply = Apply::where('user', $current_id)->where('job', $request->job)->first();
            if($exitApply){
                return \Response::json(array('code' => '200', 'message' => 'Apply is existed!'));
            }
            $apply = new Apply;

            $apply->user = $current_id;
            $apply->job = $request->job;

            if($apply->save()){
                return \Response::json(array('code' => '200', 'message' => 'Created success!'));
            }
        }
        return \Response::json(array('code' => '403', 'message' => 'Created unsuccess!'));
    }
}
