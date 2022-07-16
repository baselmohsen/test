@extends('Admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
  <h5>categories</h5>
  <a class="btn btn-sm btn-primary" href="{{route('Admin.cats.create')}}"><i class="fa-solid fa-plus"></i> add categorie</a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cats as $index=>$item)
        <tr>
            <th scope="row">{{$index+1}}</th>
            <td>{{$item->name}}</td>
            <td>
                <a class="btn btn-sm btn-info" href="{{route('Admin.cats.edit',$item->id)}}"><i class="fa-solid fa-pen-to-square"></i>edit</a>
                <a class="btn btn-sm btn-danger" href="{{route('Admin.cats.delete',$item->id)}}"><i class="fa-solid fa-trash-can"> </i>delete</a>
            </td>
          </tr>
        @endforeach
      
      
    </tbody>
  </table>
    
@endsection