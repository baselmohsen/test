@extends('Admin.layout')
@section('content')

<div class="container m-5 p-5">

    <div class="d-flex justify-content-between mb-3">
        <h5>add courses</h5>
        <a class="btn btn-sm btn-primary" href="{{route('Admin.courses')}}"> back</a>
      </div>

    @include('Admin.inc.errors')

    <form action="{{route('Admin.courses.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Enter name">
        </div>

        <div class="form-group">
          <select class="form-control" name="cat_id">
            @foreach ($data['cats'] as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach           
          </select>
        </div>

        <div class="form-group">
          <select class="form-control" name="trainer_id">
            @foreach ($data['trainers'] as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach           
          </select>
        </div>

        <div class="form-group">
          <input type="number" class="form-control" name="price" placeholder="Enter price">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="small_desc" placeholder="Enter small description">
        </div>

        <div class="form-group">
          <label for="desc">description</label>
          <textarea name="desc" id="desc" cols="70" rows="5"></textarea>
        </div>

        <div class="form-group">
          <input type="file" class="form-control-file" name="img" >
        </div>

   
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>
    
@endsection