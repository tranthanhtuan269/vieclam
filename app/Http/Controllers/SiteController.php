<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        // dd($request->input('email'));

        $user = User::Where('email', $request->input('email'))->first();
        if(!$user){
            $user_register = User::create([
                'name' => $request->input('username'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => bcrypt($request->input('password')),
            ]);

            $credentials = array('email' => $request->input('email'), 'password' => $request->input('password'));
            if(\Auth::attempt($credentials, false)){
                return \Response::json(array('code' => '200', 'message' => 'success'));
            }else{
                return \Response::json(array('code' => '404', 'message' => 'unsuccess'));
            }
        }
    }
}