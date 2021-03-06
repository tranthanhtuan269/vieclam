<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = 1; //hanoi // 2 = hochiminh // 3 =  danang

        if(isset($_GET['city']) && is_numeric($_GET['city'])){
            $city = (int)$_GET['city'];
        }

        // get district of city
        $districts = \DB::table('districts')
                    ->where('districts.city', '=', $city)
                    ->get();   

        // get cv of vip
        $cvs = \DB::table('curriculum_vitaes')
                    ->where('curriculum_vitaes.vip', '=', 1)
                    ->take(10)
                    ->get();  
        // dd($cvs);

        return view('home', compact('districts'));
    }

    public function welcome()
    {
        $city = 1;
        $district = 0;
        if(isset($_GET['district']) && is_numeric($_GET['district'])){
            $district = (int)$_GET['district'];
        }

        if($district > 0){
            // get district of city
            $district = \DB::table('districts')
                        ->where('districts.id', '=', $district)
                        ->where('districts.active', '=', 1)
                        ->first();   

            if($district){
                // get district of city
                $districts = \DB::table('districts')
                        ->where('districts.city', '=', $district->city)
                        ->where('districts.active', '=', 1)
                        ->get(); 

                $city = $district->city;

                // get job of vip
                $jobsvip1 = \DB::table('jobs')
                        ->join('companies', 'companies.id', '=', 'jobs.company')
                        ->join('salaries', 'salaries.id', '=', 'jobs.salary')
                        ->join('cities', 'cities.id', '=', 'jobs.city')
                        ->join('districts', 'districts.id', '=', 'jobs.district')
                        ->where('jobs.district', '=', $district->id)
                        ->where('jobs.vip', '=', 1)
                        ->select('jobs.id as id', 'jobs.name as name', 'salaries.name as salary', 'companies.logo', 'companies.name as companyname', 'cities.name as city', 'districts.name as district')
                        ->orderBy('jobs.created_at', 'desc')
                        ->take(10)
                        ->get();

                // get job of vip
                $jobsvip2 = \DB::table('jobs')
                        ->join('companies', 'companies.id', '=', 'jobs.company')
                        ->join('salaries', 'salaries.id', '=', 'jobs.salary')
                        ->join('cities', 'cities.id', '=', 'jobs.city')
                        ->join('districts', 'districts.id', '=', 'jobs.district')
                        ->where('jobs.district', '=', $district->id)
                        ->where('jobs.vip', '=', 2)
                        ->select('jobs.id as id', 'jobs.name as name', 'salaries.name as salary', 'companies.logo', 'companies.name as companyname', 'cities.name as city', 'districts.name as district')
                        ->orderBy('jobs.created_at', 'desc')
                        ->take(8)
                        ->get();

                // get job of vip
                $jobs = \DB::table('jobs')
                        ->join('companies', 'companies.id', '=', 'jobs.company')
                        ->join('salaries', 'salaries.id', '=', 'jobs.salary')
                        ->join('cities', 'cities.id', '=', 'jobs.city')
                        ->join('districts', 'districts.id', '=', 'jobs.district')
                        ->where('jobs.district', '=', $district->id)
                        ->select('jobs.id as id', 'jobs.name as name', 'salaries.name as salary', 'companies.logo', 'companies.name as companyname', 'cities.name as city', 'districts.name as district')
                        ->orderBy('jobs.created_at', 'desc')
                        ->take(10)
                        ->get();
            }
        }else{

            if(isset($_GET['city']) && is_numeric($_GET['city'])){
                $city = (int)$_GET['city'];
            }


            // get district of city
            $districts = \DB::table('districts')
                        ->where('districts.city', '=', $city)
                        ->where('districts.active', '=', 1)
                        ->get();   

            // get job of vip
            $jobs = \DB::table('jobs')
                        ->join('companies', 'companies.id', '=', 'jobs.company')
                        ->join('salaries', 'salaries.id', '=', 'jobs.salary')
                        ->join('cities', 'cities.id', '=', 'jobs.city')
                        ->join('districts', 'districts.id', '=', 'jobs.district')
                        ->where('jobs.city', '=', 1)
                        ->select('jobs.id as id', 'jobs.name as name', 'salaries.name as salary', 'companies.logo', 'companies.name as companyname', 'cities.name as city', 'districts.name as district')
                        ->orderBy('jobs.created_at', 'desc')
                        ->take(10)
                        ->get(); 

            // get job of vip
            $jobsvip1 = \DB::table('jobs')
                    ->join('companies', 'companies.id', '=', 'jobs.company')
                    ->join('salaries', 'salaries.id', '=', 'jobs.salary')
                    ->join('cities', 'cities.id', '=', 'jobs.city')
                    ->join('districts', 'districts.id', '=', 'jobs.district')
                    ->where('jobs.city', '=', 1)
                    ->where('jobs.vip', '=', 1)
                    ->select('jobs.id as id', 'jobs.name as name', 'salaries.name as salary', 'companies.logo', 'companies.name as companyname', 'cities.name as city', 'districts.name as district')
                    ->orderBy('jobs.created_at', 'desc')
                    ->take(10)
                    ->get();

            // get job of vip
            $jobsvip2 = \DB::table('jobs')
                    ->join('companies', 'companies.id', '=', 'jobs.company')
                    ->join('salaries', 'salaries.id', '=', 'jobs.salary')
                    ->join('cities', 'cities.id', '=', 'jobs.city')
                    ->join('districts', 'districts.id', '=', 'jobs.district')
                    ->where('jobs.city', '=', 1)
                    ->where('jobs.vip', '=', 2)
                    ->select('jobs.id as id', 'jobs.name as name', 'salaries.name as salary', 'companies.logo', 'companies.name as companyname', 'cities.name as city', 'districts.name as district')
                    ->orderBy('jobs.created_at', 'desc')
                    ->take(8)
                    ->get();
        }

        // get cv of vip
        $cvs = \DB::table('curriculum_vitaes')
            ->join('users', 'users.id', '=', 'curriculum_vitaes.user')
            ->select('curriculum_vitaes.id as id', 'users.name as username', 'curriculum_vitaes.birthday', 'curriculum_vitaes.avatar')
            ->orderBy('curriculum_vitaes.created_at', 'desc')
            ->take(10)
            ->get();  
        // get cv of vip
        $companies = \DB::table('companies')
            ->select('id', 'name', 'logo')
            ->orderBy('companies.created_at', 'desc')
            ->take(10)
            ->get();  

        return view('welcome', compact('districts', 'city', 'cvs', 'jobs', 'jobsvip1', 'jobsvip2', 'companies'));
    }

    public function getDistrict($id){
        $districts = \DB::table('districts')
                    ->where('districts.city', '=', $id)
                    ->get();   
        $html = "";
        $html .= '<option value="0">-- Chọn Quận / Huyện --</option>';
        foreach ($districts as $district) {
            $html .= '<option value="'.$district->id.'">'.$district->name.'</option>';
        }
        return $html;
    }

    public function getTown($id){
        $towns = \DB::table('towns')
                    ->where('towns.district', '=', $id)
                    ->get();   
        $html = "";
        $html .= '<option value="0">-- Chọn Phường / Xã --</option>';
        foreach ($towns as $town) {
            $html .= '<option value="'.$town->id.'">'.$town->name.'</option>';
        }
        return $html;
    }
    
    public function postImage(Request $request){
        $img_file = '';
        if ($request->hasFile('input_file_name')) {
            $file_img = $request->file('input_file_name');
            $filename = $file_img->getClientOriginalName();
            $extension = $file_img->getClientOriginalExtension();
            $img_file = date('His') . $filename;
            $destinationPath = base_path() . '/public/images';
            $file_img->move($destinationPath, $img_file);
            return \Response::json(array('code' => '200', 'message' => 'success', 'image_url' => $img_file));
        }
        return \Response::json(array('code' => '404', 'message' => 'unsuccess', 'image_url' => ""));
    }
}
