<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Job;
use App\Comment;
use App\Follow;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // load company info


        // load job of company

        // load comment of company

        // render view
        return view('company.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (\Auth::check()) {
            $current_id = \Auth::user()->id;

            // check followed
            $follow = Follow::where('user', $current_id)->where('company', $id)->first();
            if($follow) $followed = 1;
            else $followed = 0;

            // check user info
            var_dump(\Auth::user());die;
        }else{
            $followed = 0;
        }

        $company = Company::find($id);
        if($company){
            // load job of company
            $jobs = Job::where('company_id', $id)->paginate(5);

            // load comment of company
            $comments = Comment::where('company', $id)->get();
            $totalStar = 0;
            foreach ($comments as $comment) {
                $totalStar += $comment->star;
            }
            $star = intval($totalStar / count($comments));

            return view('company.index', array('company'=>$company, 'jobs' => $jobs, 'followed' => $followed, 'comments' => $comments, 'votes' => $star));
        }
        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendcomment(Request $request){
        $input = $request->all();
        $current_id = \Auth::user()->id;

        // check exist comment of user
        $commentExist = Comment::where('created_by', $current_id)->where('company', $input['company'])->first();
        if($commentExist)
            return \Response::json(array('code' => '404', 'message' => 'Bạn chỉ được gửi đánh giá 1 lần với Nhà tuyển dụng này!'));

        // store
        $comment                    = new Comment;
        $comment->title             = $input['title'];
        $comment->description       = $input['description'];
        $comment->star              = $input['countStar'];
        $comment->company           = $input['company'];
        $comment->created_by        = $current_id;
        $comment->created_at        = date("Y-m-d H:i:s");

        if($comment->save()){
            return \Response::json(array('code' => '200', 'message' => 'success', 'comment' => $comment));
        }
        return \Response::json(array('code' => '404', 'message' => 'unsuccess'));
    }

    public function follow(Request $request){
        $input = $request->all();
        $current_id = \Auth::user()->id;

        $follow = Follow::where('user', $current_id)->where('company', $input['company'])->first();
        if($follow == null){
            // store
            $follow                     = new Follow;
            $follow->user               = $current_id;
            $follow->company            = $input['company'];

            if($follow->save()){
                return \Response::json(array('code' => '200', 'message' => 'success', 'follow' => $follow));
            }
        }else{
            return \Response::json(array('code' => '200', 'message' => 'success', 'follow' => $follow));
        }
        return \Response::json(array('code' => '404', 'message' => 'unsuccess'));
    }

    public function unfollow(Request $request){
        $input = $request->all();
        $current_id = \Auth::user()->id;

        $follow = Follow::where('user', $current_id)->where('company', $input['company'])->first();
        if($follow){
            $follow->delete();
        }

        if($follow->save()){
            return \Response::json(array('code' => '200', 'message' => 'success', 'follow' => $follow));
        }
        return \Response::json(array('code' => '404', 'message' => 'unsuccess'));
    }
}
