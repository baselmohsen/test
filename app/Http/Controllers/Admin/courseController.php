<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;
use App\Models\cat;
use App\Models\course;
use App\Models\trainer;
use Illuminate\Http\Request;

class courseController extends Controller
{
    public function index(){

        $courses= course::select('id','name','price','img')->orderby('id','desc')->get();

        return view('Admin.courses.index')->with('courses',$courses);
    }
    public function create(){

        $data['cats']=cat::select('id','name')->get();
        $data['trainers']=trainer::select('id','name')->get();

        return view('Admin.courses.create')->with('data',$data);
    }

    public function store(Request $request){

        $data=$request->validate([
            'name'=>'required|string|max:50',
            'price'=>'nullable|integer',
            'small_desc'=>'required|string',
            'desc'=>'required|string',
            'cat_id'=>'required|exists:cats,id',
            'trainer_id'=>'required|exists:trainers,id',
            'img'=>'required|image|mimes:jpg,png,jpeg',
        ]);

        $new_name=$data['img']->hashName();
        Image::make($data['img'])->resize(970,520)->save(public_path('uplouds/courses/' . $new_name));
        $data['img']=$new_name;
        course::create($data);

        return redirect(route('Admin.courses'));
    }

    public function edit( $id){

        $data['cats']=cat::select('id','name')->get();
        $data['trainers']=trainer::select('id','name')->get();

        $courses=course::findorfail($id);

        return view('Admin.courses.edit',compact('courses','data'));
    }

    public function update(Request $request){
        $data=$request->validate([
            'name'=>'required|string|max:50',
            'price'=>'nullable|integer',
            'small_desc'=>'required|string',
            'desc'=>'required|string',
            'cat_id'=>'required|exists:cats,id',
            'trainer_id'=>'required|exists:trainers,id',
            'img'=>'nullable|image|mimes:jpg,png,jpeg',
        ]);
        $old_name=course::findorfail($request->id)->img;
        if ($request->hasFile('img')) {
            Storage::disk('uplouds')->delete('courses/' . $old_name );
            $new_name=$data['img']->hashName();
            Image::make($data['img'])->resize(970,520)->save(public_path('uplouds/courses/' . $new_name));
            $data['img']=$new_name;

        } else {
            $data['img']=$old_name;
        }
        
        course::findorfail($request->id)->update($data);
        return redirect(route('Admin.courses'));
    }
    public function show($id){
        $courses=course::findorfail($id);

        return view('Admin.courses.show',compact('courses'));
    }




    public function delete($id){

        $old_name=course::findorfail($id)->img;
        Storage::disk('uplouds')->delete('courses/' . $old_name );

        course::findorfail($id)->delete();
        return redirect(route('Admin.courses'));

    }







}
