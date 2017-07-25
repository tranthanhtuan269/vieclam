<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Company;
use App\Follow;
use App\Job;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class CompanyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
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
    public function create() {
        return view('company.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function createCompany() {
        // $jobTypes = 
        // companysizes = 
        // cities = 
        return view('company.create_company');
    }

    public function storeCompany(Request $request) {
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
            $img_banner = date('His') . $filename;
            $destinationPath = base_path() . '/public/images';
            $file_banner->move($destinationPath, $img_banner);
        }

        $img_logo = '';
        if ($request->hasFile('logo-img')) {
            $file_logo = $request->file('logo-img');
            $filename = $file_logo->getClientOriginalName();
            $extension = $file_logo->getClientOriginalExtension();
            $img_logo = date('His') . $filename;
            $destinationPath = base_path() . '/public/images';
            $file_logo->move($destinationPath, $img_logo);
        }

        $picture = '';
        $allPic = '';
        if ($request->hasFile('images-img')) {
            $files = $request->file('images-img');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = date('His') . $filename;
                $allPic .= $picture . ';';
                $destinationPath = base_path() . '/public/images';
                $file->move($destinationPath, $picture);
            }
        }

        $input = $request->all();
        if ($input['description'] == null)
            $input['description'] = '';
        unset($input['banner-img']);
        unset($input['logo-img']);
        unset($input['images-img']);
        $input['logo'] = $img_logo;
        $input['banner'] = $img_banner;
        $input['images'] = $allPic;
        $input['user'] = \Auth::user()->id;
        
        $company = Company::create($input);

        if ($company) {
            return redirect()->action(
                    'CompanyController@info', ['id' => $company->id]
                );
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
    public function store(Request $request) {
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
    public function show($id) {
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
    public function edit($id) {
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
    public function update($id, Request $request) {
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
    public function destroy($id) {
        Company::destroy($id);

        Session::flash('flash_message', 'Company deleted!');

        return redirect('admin/company');
    }

    public function info($id) {
         // load company info
        if (\Auth::check()) {
            $current_id = \Auth::user()->id;

            // check followed
            $follow = Follow::where('user', $current_id)->where('company', $id)->first();
            if ($follow)
                $followed = 1;
            else
                $followed = 0;
        }else {
            $followed = 0;
        }

        // $company = Company::find($id);
        $company = \DB::table('companies')
                ->join('cities', 'cities.id', '=', 'companies.city')
                ->join('districts', 'districts.id', '=', 'companies.district')
                ->join('towns', 'towns.id', '=', 'companies.town')
                ->join('company_sizes', 'company_sizes.id', '=', 'companies.size')
                ->join('users', 'users.id', '=', 'companies.user')
                ->select(
                        'companies.id', 
                        'companies.name', 
                        'companies.logo', 
                        'companies.user', 
                        'companies.banner', 
                        'companies.lat', 
                        'companies.lng', 
                        'companies.address', 
                        'cities.name as city', 
                        'districts.name as district', 
                        'towns.name as town', 
                        'companies.jobs', 
                        'company_sizes.size as size', 
                        'companies.sologan', 
                        'companies.description',
                        'companies.images',
                        'users.phone as hotline'
                )
                ->where('companies.id', $id)
                ->first();

        if ($company) {
            // load comment of company
            $comments = Comment::where('company', $id)->get();
            $totalStar = 0;
            foreach ($comments as $comment) {
                $totalStar = $comment->star;
            }

            if (count($comments) == 0)
                $numberComment = 1;
            else
                $numberComment = count($comments);

            $star = intval($totalStar / $numberComment);

            return view('company.info', array('company' => $company, 'followed' => $followed, 'comments' => $comments, 'votes' => $star));
        }
        return view('errors.404');
    }

    public function listjobs($id) {
        // load company info
        if (\Auth::check()) {
            $current_id = \Auth::user()->id;

            // check followed
            $follow = Follow::where('user', $current_id)->where('company', $id)->first();
            if ($follow)
                $followed = 1;
            else
                $followed = 0;
        }else {
            $followed = 0;
        }

        $company = Company::find($id);

        if ($company) {
            $company->hotline = $company->getPhoneNumber($company->user);
            // load job of company
            $jobs = Job::where('company', $id)->paginate(5);

            // load comment of company
            $comments = Comment::where('company', $id)->get();
            $totalStar = 0;
            foreach ($comments as $comment) {
                $totalStar = $comment->star;
            }

            if (count($comments) == 0)
                $numberComment = 1;
            else
                $numberComment = count($comments);

            $star = intval($totalStar / $numberComment);

            return view('company.listjobs', array('company' => $company, 'jobs' => $jobs, 'followed' => $followed, 'comments' => $comments, 'votes' => $star));
        }
        return view('errors.404');
    }

    public function sendcomment(Request $request) {
        $input = $request->all();
        $current_id = \Auth::user()->id;

        // check exist comment of user
        $commentExist = Comment::where('created_by', $current_id)->where('company', $input['company'])->first();

        if ($commentExist)
            return \Response::json(array('code' => '404', 'message' => 'Bạn chỉ được gửi đánh giá 1 lần với Nhà tuyển dụng này!'));

        // store
        $comment = new Comment;
        $comment->title = $input['title'];
        $comment->description = $input['description'];
        $comment->star = $input['countStar'];
        $comment->company = $input['company'];
        $comment->created_by = $current_id;
        $comment->created_at = date("Y-m-d H:i:s");

        if ($comment->save()) {
            return \Response::json(array('code' => '200', 'message' => 'success', 'comment' => $comment));
        }
        return \Response::json(array('code' => '404', 'message' => 'unsuccess'));
    }

    public function follow(Request $request) {
        $input = $request->all();
        $current_id = \Auth::user()->id;

        $follow = Follow::where('user', $current_id)->where('company', $input['company'])->first();
        if ($follow == null) {
            // store
            $follow = new Follow;
            $follow->user = $current_id;
            $follow->company = $input['company'];

            if ($follow->save()) {
                return \Response::json(array('code' => '200', 'message' => 'success', 'follow' => $follow));
            }
        } else {
            return \Response::json(array('code' => '200', 'message' => 'success', 'follow' => $follow));
        }
        return \Response::json(array('code' => '404', 'message' => 'unsuccess'));
    }

    public function unfollow(Request $request) {
        $input = $request->all();
        $current_id = \Auth::user()->id;

        $follow = Follow::where('user', $current_id)->where('company', $input['company'])->first();
        if ($follow) {
            if ($follow->delete()) {
                return \Response::json(array('code' => '200', 'message' => 'success', 'follow' => $follow));
            } else {
                return \Response::json(array('code' => '404', 'message' => 'unsuccess'));
            }
        }
    }

}
