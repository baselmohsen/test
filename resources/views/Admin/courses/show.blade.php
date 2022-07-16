@extends('Admin.layout')
@section('content')

<div class="container ">

  <div class="d-flex justify-content-between mb-3">
      <h5>details of  course</h5>
      <a class="btn btn-sm btn-primary" href="{{route('Admin.courses')}}"> back</a>
    </div>

  @include('Admin.inc.errors')

      <div class="form-group">
        <label for="text">course name</label>
        <input type="text" id="text" class="form-control" value="{{$courses->name}}" name="name" >
      </div>

      
      <div class="form-group">
        <label for="cat">which gategorie</label>
        <input type="text" id="cat" class="form-control" value="{{$courses->cat->name}}" >
      </div>

      <div class="form-group">
        <label for="trainer">which trainer</label>
        <input type="text" id="trainer" class="form-control" value="{{$courses->trainer->name}}" >
      </div>

      <div class="form-group">
        <label for="number">salary</label>
        <input type="number" id="number" class="form-control" value="{{$courses->price}}" name="price" >
      </div>

      <div class="form-group">
        <label for="small_desc">small description</label>

        <input type="text" id="small_desc" class="form-control" value="{{$courses->small_desc}}" name="small_desc" >
      </div>

      <div class="form-group">
        <label for="desc">description</label>
        <textarea name="desc" id="desc" cols="70" rows="5">{{$courses->desc}}</textarea>
      </div>

      <div class="form-group">
        <img src="{{asset('uplouds/courses/' . $courses->img)}}"   style=" border-width:10%;
        border-color: rgb(15, 12, 12);
        border-style: solid" width="400px" alt="" >
      </div>



</div>
  
    
@endsection