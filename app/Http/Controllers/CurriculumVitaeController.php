<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CurriculumVitae;
use Illuminate\Http\Request;
use Session;

class CurriculumVitaeController extends Controller
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
            $curriculumvitae = CurriculumVitae::where('user', 'LIKE', "%$keyword%")
				->orWhere('avatar', 'LIKE', "%$keyword%")
				->orWhere('birthday', 'LIKE', "%$keyword%")
				->orWhere('gender', 'LIKE', "%$keyword%")
				->orWhere('address', 'LIKE', "%$keyword%")
				->orWhere('city', 'LIKE', "%$keyword%")
				->orWhere('district', 'LIKE', "%$keyword%")
				->orWhere('town', 'LIKE', "%$keyword%")
				->orWhere('education', 'LIKE', "%$keyword%")
				->orWhere('word_experience', 'LIKE', "%$keyword%")
				->orWhere('language', 'LIKE', "%$keyword%")
				->orWhere('interests', 'LIKE', "%$keyword%")
				->orWhere('references', 'LIKE', "%$keyword%")
				->orWhere('qualification', 'LIKE', "%$keyword%")
				->orWhere('career_objective', 'LIKE', "%$keyword%")
				->orWhere('images', 'LIKE', "%$keyword%")
				->orWhere('active', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $curriculumvitae = CurriculumVitae::paginate($perPage);
        }

        return view('curriculum-vitae.index', compact('curriculumvitae'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('curriculum-vitae.create');
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
			'user' => 'required'
		]);
        $requestData = $request->all();
        
        CurriculumVitae::create($requestData);

        Session::flash('flash_message', 'CurriculumVitae added!');

        return redirect('admin/curriculum-vitae');
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
        $curriculumvitae = CurriculumVitae::findOrFail($id);

        return view('curriculum-vitae.show', compact('curriculumvitae'));
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
        $curriculumvitae = CurriculumVitae::findOrFail($id);

        return view('curriculum-vitae.edit', compact('curriculumvitae'));
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
			'user' => 'required'
		]);
        $requestData = $request->all();
        
        $curriculumvitae = CurriculumVitae::findOrFail($id);
        $curriculumvitae->update($requestData);

        Session::flash('flash_message', 'CurriculumVitae updated!');

        return redirect('admin/curriculum-vitae');
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
        CurriculumVitae::destroy($id);

        Session::flash('flash_message', 'CurriculumVitae deleted!');

        return redirect('admin/curriculum-vitae');
    }
}
