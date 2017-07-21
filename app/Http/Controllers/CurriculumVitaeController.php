<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CurriculumVitae;
use App\CommentCurriculumVitae;
use App\Company;
use App\User;
use Illuminate\Http\Request;
use Session;
// use Carbon\Carbon;

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

    public function showCurriculumVitae($id)
    {
        $curriculumvitae = CurriculumVitae::findOrFail($id);
        $user = User::findOrFail($curriculumvitae->user);
        $curriculumvitae = \DB::table('curriculum_vitaes')
                ->join('cities', 'cities.id', '=', 'curriculum_vitaes.city')
                ->join('districts', 'districts.id', '=', 'curriculum_vitaes.district')
                ->join('users', 'users.id', '=', 'curriculum_vitaes.user')
                ->select(
                        'curriculum_vitaes.id', 
                        'curriculum_vitaes.avatar', 
                        'curriculum_vitaes.birthday', 
                        'curriculum_vitaes.gender', 
                        'users.name as name', 
                        'curriculum_vitaes.address', 
                        'cities.name as city', 
                        'districts.name as district', 
                        'curriculum_vitaes.education', 
                        'curriculum_vitaes.word_experience', 
                        'curriculum_vitaes.language', 
                        'curriculum_vitaes.interests', 
                        'curriculum_vitaes.references', 
                        'curriculum_vitaes.qualification', 
                        'curriculum_vitaes.career_objective', 
                        'curriculum_vitaes.images', 
                        'curriculum_vitaes.active', 
                        'curriculum_vitaes.updated_at' 
                )
                ->where('curriculum_vitaes.id', $id)
                ->first();
        // dd($curriculumvitae);

        return view('curriculum-vitae.show-curriculum-vitae', compact('curriculumvitae', 'user'));
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
    
    public function createCurriculumVitae() {
        return view('curriculum-vitae.create_curriculum_vitae');
    }
    
    public function storeCurriculumVitae(Request $request) {
        // $validator = Validator::make($request->all(), [
        //     'tieu_de' => 'required|max:255',
        // ]);
        // if ($validator->fails()) {
        //     return redirect('tinbds/create')
        //             ->withErrors($validator)
        //             ->withInput();
        // }

        // dd($request);


        
        $img_avatar = '';
        if ($request->hasFile('avatar-img')) {
            $file_avatar = $request->file('avatar-img');
            $filename = $file_avatar->getClientOriginalName();
            $extension = $file_avatar->getClientOriginalExtension();
            $img_avatar = date('His') . $filename;
            $destinationPath = base_path() . '/public/images';
            $file_avatar->move($destinationPath, $img_avatar);
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

        unset($input['avatar-img']);
        unset($input['images-img']);
        unset($input['bang_cap_0']);
        unset($input['student_process_0']);

        $input['avatar'] = $img_avatar;
        $input['images'] = $allPic;
        $input['user'] = \Auth::user()->id;
        $input['created_at'] = date("Y-m-d H:i:s");
        $input['updated_at'] = date("Y-m-d H:i:s");
        
        $curriculumVitae = CurriculumVitae::create($input);

        if ($curriculumVitae) {
            return redirect()->action(
                    'CurriculumVitaeController@showCurriculumVitae', ['id' => $curriculumVitae->id]
                );
        }

        return redirect()->back();
    }

    public function sendcomment(Request $request) {
        $input = $request->all();
        $current_id = \Auth::user()->id;

        // check exist comment of user
        $commentExist = CommentCurriculumVitae::where('created_by', $current_id)->where('curriculumvitae', $input['curriculumvitae'])->first();

        if ($commentExist)
            return \Response::json(array('code' => '404', 'message' => 'Bạn chỉ được gửi đánh giá 1 lần với Ứng viên này!'));

        // store
        $comment = new CommentCurriculumVitae;
        $comment->description = $input['description'];
        $comment->star = $input['countStar'];
        $comment->curriculumvitae = $input['curriculumvitae'];
        $comment->created_by = $current_id;
        $comment->created_at = date("Y-m-d H:i:s");

        if ($comment->save()) {
            return \Response::json(array('code' => '200', 'message' => 'success', 'comment' => $comment));
        }
        return \Response::json(array('code' => '404', 'message' => 'unsuccess'));
    }
}
