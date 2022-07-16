@extends('Admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
  <h5>students</h5>
  <a class="btn btn-sm btn-primary" href="{{route('Admin.students.create')}}"><i class="fa-solid fa-plus"></i> add students</a>
</div>
<div class="row">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">Specialization</th>
        <th scope="col">actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($students as $index=>$item)
        <tr>
            <th scope="row">{{$item->id}}</th>
          
            <td>{{$item->name}}</td>           
            <td>{{$item->email}}</td>
            <td> 
            @if ($item->spec !== null)
            {{$item->spec}}
            @else          
              no Specialization
             @endif
            </td>
            <td>
                <a class="btn btn-sm btn-info" href="{{route('Admin.students.edit',$item->id)}}"><i class="fa-solid fa-pen-to-square"></i> edit</a>
                <a class="btn btn-sm btn-danger" href="{{route('Admin.students.delete',$item->id)}}"><i class="fa-solid fa-trash-can"> </i> delete</a>
                <a class="btn btn-sm btn-primary" href="{{route('Admin.students.showcourses',$item->id)}}"> show courses</a>
            </td>
          </tr>
        @endforeach     
               
    </tbody>   
  </table>
      {!! $students->links() !!}


  
</div>

@endsection