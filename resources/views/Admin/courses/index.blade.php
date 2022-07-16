@extends('Admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
  <h5>courses</h5>
  <a class="btn btn-sm btn-primary" href="{{route('Admin.courses.create')}}"><i class="fa-solid fa-plus"></i> add courses</a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">img</th>
        <th scope="col">name</th>
        <th scope="col">price</th>
        <th scope="col">actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($courses as $index=>$item)
        <tr>
            <th scope="row">{{$index+1}}</th>
            <td>
              <img src="{{asset('uplouds/courses/' . $item->img)}}" width="100px" alt="img">
            </td>
            <td>{{$item->name}}</td>           
            <td>{{$item->price}}</td>
            <td>
                <a class="btn btn-sm btn-info" href="{{route('Admin.courses.edit',$item->id)}}"><i class="fa-solid fa-pen-to-square"></i>edit</a>
                <a class="btn btn-sm btn-danger" href="{{route('Admin.courses.delete',$item->id)}}"><i class="fa-solid fa-trash-can"> </i>delete</a>
                <a class="btn btn-sm btn-primary" href="{{route('Admin.courses.show',$item->id)}}"><i class="fa-solid fa-eye"></i>show</a>
            </td>
          </tr>
        @endforeach
      
      
    </tbody>
  </table>
    
@endsection