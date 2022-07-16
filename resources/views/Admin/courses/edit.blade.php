@extends('Admin.layout')
@section('content')

<div class="container ">

  <div class="d-flex justify-content-between mb-3">
      <h5>edit course</h5>
      <a class="btn btn-sm btn-primary" href="{{route('Admin.courses')}}"> back</a>
    </div>

  @include('Admin.inc.errors')

  <form action="{{route('Admin.courses.update')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$courses->id}}">

      <div class="form-group">
        <label for="text">course name</label>
        <input type="text" id="text" class="form-control" value="{{$courses->name}}" name="name" >
      </div>

      <div class="form-group">
        <label for="cat">which gategorie</label>
        <select class="form-control" name="cat_id" id="cat">
          @foreach ($data['cats'] as $cat)
          <option value="{{$cat->id}}" @if($courses->cat_id == $cat->id) selected @endif>{{$cat->name}}</option>
          @endforeach           
        </select>
      </div>

      <div class="form-group">
        <label for="trainer">which trainer</label>
        <select class="form-control" id="trainer" name="trainer_id">
          @foreach ($data['trainers'] as $trainer)
          <option value="{{$trainer->id}}" @if($courses->trainer_id == $trainer->id) selected @endif>{{$trainer->name}}</option>
          @endforeach           
        </select>
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
      
        <img src="{{asset('uplouds/courses/' . $courses->img)}}" style=" border-width:10%;
        border-color: rgb(15, 12, 12);
        border-style: solid" width="300px" alt="" >
      </div>


      <div class="form-group">
        <input type="file" class="form-control-file" name="img" >
      </div>

 
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
  
    
@endsection