<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
class trainersController extends Controller
{
    public function index(){

        $trainers= trainer::select('id','name','phone','spec','img')->orderby('id','desc')->get();

        return view('Admin.trainers.index')->with('trainers',$trainers);
    }
    public function create(){

        return view('Admin.trainers.create');
    }

    public function store(Request $request){

        $data=$request->validate([
            'name'=>'required|string|max:50',
            'phone'=>'nullable|string|max:50',
            'spec'=>'required|string|max:50',
            'img'=>'required|image|mimes:jpg,png,jpeg',
        ]);

        $new_name=$data['img']->hashName();
        Image::make($data['img'])->resize(50,50)->save(public_path('uplouds/trainers/' . $new_name));
        $data['img']=$new_name;
        trainer::create($data);

        return redirect(route('Admin.trainers'));
    }

    public function edit( $id){
        $trainers=trainer::findorfail($id);

        return view('Admin.trainers.edit')->with('trainers',$trainers);
    }

    public function update(Request $request){
        $data=$request->validate([
            'name'=>'required|string|max:50',
            'phone'=>'nullable|string|max:50',
            'spec'=>'required|string|max:50',
            'img'=>'nullable|image|mimes:jpg,png,jpeg',
        ]);
        $old_name=trainer::findorfail($request->id)->img;
        if ($request->hasFile('img')) {
            Storage::disk('uplouds')->delete('trainers/' . $old_name );
            $new_name=$data['img']->hashName();
            Image::make($data['img'])->resize(50,50)->save(public_path('uplouds/trainers/' . $new_name));
            $data['img']=$new_name;

        } else {
            $data['img']=$old_name;
        }
        
        trainer::findorfail($request->id)->update($data);
        return redirect(route('Admin.trainers'));
    }

    public function delete($id){

        $old_name=trainer::findorfail($id)->img;
        Storage::disk('uplouds')->delete('trainers/' . $old_name );

        trainer::findorfail($id)->delete();
        return redirect(route('Admin.trainers'));

    }







}
