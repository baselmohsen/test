@extends('Admin.layout')

@section('content')

<div class="d-flex justify-content-between ">
  <h5>trainers</h5>
  <a class="btn btn-sm btn-primary" href="{{route('Admin.trainers.create')}}"><i class="fa-solid fa-plus"></i> add trainers</a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">img</th>
        <th scope="col">name</th>
        <th scope="col">phone</th>
        <th scope="col">specialty</th>
        <th scope="col">actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($trainers as $index=>$item)
        <tr>
            <th scope="row">{{$index+1}}</th>
            <td>
              <img src="{{asset('uplouds/trainers/' . $item->img)}}" width="50px" alt="img">
            </td>
            <td>{{$item->name}}</td>
            <td>
             @if ($item->phone !== null)
               {{$item->phone}}              
             @else
               no number  
             @endif
            </td>

            <td>{{$item->spec}}</td>
            <td>
                <a class="btn btn-sm btn-info" href="{{route('Admin.trainers.edit',$item->id)}}"><i class="fa-solid fa-pen-to-square"></i>edit</a>
                <a class="btn btn-sm btn-danger" href="{{route('Admin.trainers.delete',$item->id)}}"><i class="fa-solid fa-trash-can"> </i>delete</a>
            </td>
          </tr>
        @endforeach
      
      
    </tbody>
  </table>
    
@endsection