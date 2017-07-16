<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class CompanyController extends Controller
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
            $company = Company::where('user', 'LIKE', "%$keyword%")
				->orWhere('banner', 'LIKE', "%$keyword%")
				->orWhere('logo', 'LIKE', "%$keyword%")
				->orWhere('name', 'LIKE', "%$keyword%")
				->orWhere('sub_name', 'LIKE', "%$keyword%")
				->orWhere('tax_code', 'LIKE', "%$keyword%")
				->orWhere('sologan', 'LIKE', "%$keyword%")
				->orWhere('size', 'LIKE', "%$keyword%")
				->orWhere('jobs', 'LIKE', "%$keyword%")
				->orWhere('city', 'LIKE', "%$keyword%")
				->orWhere('district', 'LIKE', "%$keyword%")
				->orWhere('town', 'LIKE', "%$keyword%")
				->orWhere('address', 'LIKE', "%$keyword%")
				->orWhere('description', 'LIKE', "%$keyword%")
				->orWhere('images', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $company = Company::paginate($perPage);
        }

        return view('company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function createCompany()
    {
        // $jobTypes = 
        // companysizes = 
        // cities = 
        return view('company.create_company');
    }

    public function storeCompany(Request $request){
        // var_dump($request->hasFile('images-img'));die;
        // $validator = Validator::make($request->all(), [
        //     'tieu_de' => 'required|max:255',
        // ]);

        // if ($validator->fails()) {
        //     return redirect('tinbds/create')
        //             ->withErrors($validator)
        //             ->withInput();
        // }

        $img_banner = '';
        if ($request->hasFile('banner-img')) {
            $file_banner = $request->file('banner-img');
            $filename = $file_banner->getClientOriginalName();
            $extension = $file_banner->getClientOriginalExtension();
            $img_banner = date('His').$filename;
            $destinationPath = base_path() . '/public/images';
            $file_banner->move($destinationPath, $img_banner);
        }

        $img_logo = '';
        if ($request->hasFile('logo-img')) {
            $file_logo = $request->file('logo-img');
            $filename = $file_logo->getClientOriginalName();
            $extension = $file_logo->getClientOriginalExtension();
            $img_logo = date('His').$filename;
            $destinationPath = base_path() . '/public/images';
            $file_logo->move($destinationPath, $img_logo);
        }

        $picture = '';
        $allPic = '';
        if ($request->hasFile('images-img')) {
            $files = $request->file('images-img');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = date('His').$filename;
                var_dump($picture);
                $allPic .= $picture . ';';
                $destinationPath = base_path() . '/public/images';
                $file->move($destinationPath, $picture);
            }
        }

        $input = $request->all();
        unset($input['banner-img']);
        unset($input['logo-img']);
        unset($input['images-img']);
        $input['logo'] = $img_logo;
        $input['banner'] = $img_banner;
        $input['images'] = $allPic;
        $input['sologan'] = '';
        $input['user'] = \Auth::user()->id;
        
        if(Company::create($input)){
            return Redirect::route('company.index');
        }

        return redirect()->back();
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
        
        Company::create($requestData);

        Session::flash('flash_message', 'Company added!');

        return redirect('admin/company');
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
        $company = Company::findOrFail($id);

        return view('company.show', compact('company'));
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
        $company = Company::findOrFail($id);

        return view('company.edit', compact('company'));
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
        
        $company = Company::findOrFail($id);
        $company->update($requestData);

        Session::flash('flash_message', 'Company updated!');

        return redirect('admin/company');
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
        Company::destroy($id);

        Session::flash('flash_message', 'Company deleted!');

        return redirect('admin/company');
    }
}
