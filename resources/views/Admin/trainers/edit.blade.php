@extends('Admin.layout')
@section('content')

<div class="container m-5 p-5">

  <div class="d-flex justify-content-between mb-3">
      <h5>edit trainer</h5>
      <a class="btn btn-sm btn-primary" href="{{route('Admin.trainers')}}"> back</a>
    </div>

  @include('Admin.inc.errors')

  <form action="{{route('Admin.trainers.update')}}" method="POST" enctype="multipart/form-data">
      @csrf
       <input type="hidden" name="id" value="{{$trainers->id}}">
      <div class="form-group">
        <input type="text" class="form-control" value="{{$trainers->name}}" name="name" placeholder="Enter name">
      </div>

      <div class="form-group">
        <input type="text" class="form-control" value="{{$trainers->phone}}" name="phone" placeholder="Enter phone">
      </div>

      <div class="form-group">
        <input type="text" class="form-control" value="{{$trainers->spec}}" name="spec" placeholder="Enter specialty">
      </div>
      <div class="form-group">
        <img src="{{asset('uplouds/trainers/' . $trainers->img)}}"    width="200px" porder="" alt="" >
      </div>

      <div class="form-group">
        <input type="file"  class="form-control-file "  name="img" placeholder="Enter name">
      </div>

 
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
  
    
@endsection