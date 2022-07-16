<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\course;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    public function index(){

        $students= student::select('id','name','email','spec')->orderby('id','desc')->paginate(20);

        return view('Admin.students.index')->with('students',$students);

    }

    public function create(){

        $data['courses']=course::select('id','name')->get();
        // $students=$id;

        return view('Admin.students.create',compact('data'));
    }

    public function store(Request $request){

    
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
            'course_id'=>$data['course_id'],
            'student_id'=>$student_id,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);


        return redirect(route('Admin.students'));
    }

    public function edit( $id){

        $data['courses']=course::select('id','name')->get();

        $students=student::findorfail($id);

        return view('Admin.students.edit',compact('students','data'));
    }

    public function update(Request $request){
        $data=$request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|email|max:50|unique:students',
            'spec'=>'nullable|string|max:50',            
            'course_id'=>'required|exists:courses,id',
        ]);      
        student::findorfail($request->id)->update($data);
        return redirect(route('Admin.students'));
    }
   
    public function delete($id){

        student::findorfail($id)->delete();
        return redirect(route('Admin.students'));
    }
    public function showcourses($id){
        $data['courses']=student::findorfail($id)->courses;
        $data['student_id']=$id;

        return view('Admin.students.showcourses',compact('data'));
    }

    public function approve($id,$c_id){

        DB::table('course_student')->where('student_id',$id)->where('course_id',$c_id)->update([
            'status'=>'approve'
        ]);
        return redirect()->back();
    }

    public function reject($id,$c_id){

        DB::table('course_student')->where('student_id',$id)->where('course_id',$c_id)->update([
            'status'=>'reject'
        ]);
        return redirect()->back();
    }



}
