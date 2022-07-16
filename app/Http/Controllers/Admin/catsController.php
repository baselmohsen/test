<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\cat;
use Illuminate\Http\Request;

class catsController extends Controller
{
    public function index(){

        $cats= cat::select('id','name')->orderby('id','desc')->get();

        return view('Admin.cats.index')->with('cats',$cats);
    }
    public function create(){

        return view('Admin.cats.create');
    }

    public function store(Request $request){

        $data=$request->validate([
            'name'=>'required|string|max:50'
        ]);

        cat::create($data);

        return redirect(route('Admin.cats'));
    }

    public function edit( $id){
        $cat=cat::findorfail($id);

        return view('Admin.cats.edit')->with('cat',$cat);
    }

    public function update(Request $request){
        $data=$request->validate([
            'name'=>'required|string|max:20'
        ]);
        cat::findorfail($request->id)->update($data);
        return redirect(route('Admin.cats'));
    }

    public function delete($id){

        cat::findorfail($id)->delete();
        return redirect(route('Admin.cats'));



    }







}
