@extends('Admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
  <h5>students</h5>
  <a class="btn btn-sm btn-primary" href="{{route('Admin.students.create')}}"><i class="fa-solid fa-plus"></i> add students</a>
</div>

<h3>the courses that this student enter</h3>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>     
        <th scope="col">status</th>     
        <th scope="col">actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data['courses'] as $index=>$item)
        <tr>
            <th scope="row">{{$index+1}}</th>
          
            <td>{{$item->name}}</td>                      
            <td>{{$item->pivot->status}}</td>                      
            <td>
                @if($item->pivot->status !== 'approve')               
                <a class="btn btn-sm btn-info" href="{{route('Admin.students.approve',[$data['student_id'],$item->id])}}"><i class="fa-solid fa-pen-to-square"></i> approve</a>
                @endif
                @if($item->pivot->status !== 'reject')               
                <a class="btn btn-sm btn-danger" href="{{route('Admin.students.reject',[$data['student_id'],$item->id])}}"><i class="fa-solid fa-trash-can"> </i> reject</a>
                @endif

            </td>
          </tr>
        @endforeach     
               
    </tbody>   
  </table>




@endsection