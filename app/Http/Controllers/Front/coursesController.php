<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\cat;
use App\Models\course;
use App\Models\testmo;
use Illuminate\Http\Request;

class coursesController extends Controller
{
    public function index($id){

        $data['cat']= cat::findorfail($id);
        $data['courses']= course::where('cat_id',$id)->paginate(3);
        $data['testmo']=testmo::all();

        return view('Front.courses.cat')->with('data',$data);
    }

    public function show($id,$c_id){

        $data['course']= course::findorfail($c_id);
    
        return view('Front.courses.course')->with('data',$data);
    }



}

