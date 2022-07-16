<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\message;
use App\Models\newsletter;
use App\Models\student;
use Illuminate\Http\Request;

class messageController extends Controller
{
    public function newsletter(Request $request){

        $data= $request->validate([
            'email'=>'required|email'
        ]);

        newsletter::create($data);
        return redirect()->back();
    }

    public function contact(Request $request){

        $data= $request->validate([
            'name'=>'required',
            'message'=>'required',
            'email'=>'required|email',
            'subject'=>'nullable'
        ]);

        message::create($data);
        return redirect()->back();
    }

    public function enroll(Request $request){

        $data= $request->validate([
            'name'=>'required',
            'spec'=>'nullable',
            'email'=>'required|email',
            'course_id'=>'required|exists:courses,id'
        ]);

        $old_student=student::select('id')->where('email',$data['email'])->first();
        if($old_student == null)
        {
            $student=student::create([
                'name'=>$data['name'],
                'spec'=>$data['spec'],
                'email'=>$data['email'],
            ]);
    
            $student_id=$student->id;

        }else
        {
            $student_id=$old_student->id;
            if($data['name'] !== null)
            {
                $old_student->update(['name'=>$data['name']]);
            }
            if($data['spec'] !== null)
            {
                $old_student->update(['spec'=>$data['spec']]);
            }


        }
       

        DB::table('course_student')->insert([
            'course_id' => $data['course_id'],
            'student_id' => $student_id,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);


        return redirect()->back();
    }



}
