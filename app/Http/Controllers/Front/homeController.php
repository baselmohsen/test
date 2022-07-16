<?php

namespace App\Http\Controllers\Front;
use App\Models\course;
use App\Models\trainer;
use App\Models\student;
use App\Models\cat;
use App\Models\testmo;
use App\Http\Controllers\Controller;
use App\Models\Sitecontent;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){

        $data['banner']=Sitecontent::select('content')->where('name','banner')->first();
        $data['courseContent']=Sitecontent::select('content')->where('name','courses')->first();

        $data['courses']= course::orderby('id','desc')->take(3)->get();

        $data['courses_count']=course::count();
        $data['trainers_count']=trainer::count();
        $data['students_count']=student::count();
        $data['cat_count']=cat::count();

        $data['testmo']=testmo::all();
        return view('Front.home')->with('data',$data);
    }
}
