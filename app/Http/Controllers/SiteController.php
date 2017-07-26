<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function loginApi(Request $request){
        // dd($request->all());

        $credentials = array('email' => $request->input('email'), 'password' => $request->input('password'));
        // dd(\Auth::attempt($credentials, false));
        if(\Auth::attempt($credentials, false)){
            return \Response::json(array('code' => '200', 'message' => 'success'));
        }
        return \Response::json(array('code' => '404', 'message' => 'unsuccess'));
    }

    public function registerApi(Request $request){
        dd($request->all());

        $credentials = array('email' => $request->input('email'), 'password' => $request->input('password'));
        // dd(\Auth::attempt($credentials, false));
        if(\Auth::attempt($credentials, false)){
            return \Response::json(array('code' => '200', 'message' => 'success'));
        }
        return \Response::json(array('code' => '404', 'message' => 'unsuccess'));
    }
}