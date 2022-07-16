@extends('Admin.layout')
@section('content')

<div class="container m-5 p-5">

    <div class="d-flex justify-content-between mb-3">
        <h5>add categories</h5>
        <a class="btn btn-sm btn-primary" href="{{route('Admin.cats')}}"> back</a>
      </div>

    @include('Admin.inc.errors')
    <form action="{{route('Admin.cats.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Enter name">
        </div>
   
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>
    
@endsection