<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\District;
use App\City;
use Illuminate\Http\Request;
use Session;

class DistrictController extends Controller
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
            $district = District::where('name', 'LIKE', "%$keyword%")
				->orWhere('city', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $district = District::paginate($perPage);
        }

        return view('district.index', compact('district'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cities = City::pluck('name', 'id');
        return view('district.create', compact('cities'));
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
			'city' => 'required'
		]);
        $requestData = $request->all();
        
        District::create($requestData);

        Session::flash('flash_message', 'District added!');

        return redirect('admin/district');
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
        $district = District::findOrFail($id);
        $city = City::findOrFail($district->city);
        return view('district.show', compact('district', 'city'));
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
        $district = District::findOrFail($id);
        $cities = City::pluck('name', 'id');
        return view('district.edit', compact('district', 'cities'));
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
			'city' => 'required'
		]);
        $requestData = $request->all();
        
        $district = District::findOrFail($id);
        $district->update($requestData);

        Session::flash('flash_message', 'District updated!');

        return redirect('admin/district');
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
        District::destroy($id);

        Session::flash('flash_message', 'District deleted!');

        return redirect('admin/district');
    }
}
