<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- font awesome file cdn --}}
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- css bootsrap file cdn --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Dashboard</title>
    <link rel="icon" href="{{asset('uplouds/settings/favicon.png') }}">

</head>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{ route('Front.home') }}"> <img src="{{asset('uplouds/settings/logo.png' ) }} " alt="logo"> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
              <a class="nav-link" href="{{route('Admin.cats')}}"> categories </a>
            </li> 

            <li class="nav-item active">
              <a class="nav-link" href="{{route('Admin.trainers')}}"> trainers </a>
            </li> 
            <li class="nav-item active">
              <a class="nav-link" href="{{route('Admin.courses')}}">courses </a>
            </li> 
            <li class="nav-item active">
              <a class="nav-link" href="{{route('Admin.students')}}"> students </a>
            </li> 



          </ul>       
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('Admin.logout')}}"><i class="fa-solid fa- </a>
            </li> 
          </ul> 
        </div>
      </nav>





