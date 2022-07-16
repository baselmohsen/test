@extends('Admin.layout')
@section('content')

<div class="container m-5 p-5">

    <div class="d-flex justify-content-between mb-3">
        <h5>add trainers</h5>
        <a class="btn btn-sm btn-primary" href="{{route('Admin.trainers')}}"> back</a>
      </div>

    @include('Admin.inc.errors')

    <form action="{{route('Admin.trainers.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Enter name">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="phone" placeholder="Enter phone">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="spec" placeholder="Enter specialty">
        </div>

        <div class="form-group">
          <input type="file" class="form-control-file" name="img" placeholder="Enter name">
        </div>

   
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>
    
@endsection