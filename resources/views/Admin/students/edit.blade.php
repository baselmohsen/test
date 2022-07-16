@extends('Admin.layout')
@section('content')

<div class="container ">

  <div class="d-flex justify-content-between mb-3">
      <h5>edit students</h5>
      <a class="btn btn-sm btn-primary" href="{{route('Admin.students')}}"> back</a>
    </div>

  @include('Admin.inc.errors')

  <form action="{{route('Admin.students.update')}}" method="POST" >
      @csrf

      <div class="form-group">
        <input type="text" class="form-control" value="{{$students->name}}" name="name" placeholder="Enter name">
      </div>

      <div class="form-group">
        <select class="form-control" name="course_id">
          @foreach ($data['courses'] as $course)
          <option value="{{$course->id}}" @if($course->pivot->course_id == $course->id) selected @endif>{{$course->name}}</option>
          @endforeach           
        </select>
      </div>
     

      <div class="form-group">
        <input type="email" class="form-control" value="{{$students->email}}" name="email" placeholder="Enter email">
      </div>

      <div class="form-group">
        <input type="text" class="form-control" value="{{$students->spec}}" name="spec" placeholder="Enter Specialization">
      </div>

 
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
  
  
    
@endsection