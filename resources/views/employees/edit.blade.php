{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color: black">

    <h1>hello </h1>
    
</body>
</html> --}}

{{-- <h1>Add new contact</h1>
<a href="{{route('contact.index')}}">Back to all contacts</a> --}}

@extends('layouts/main')

@section('title', 'MINI-CRM || Company Form')

@section('content')
<main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Update Employee</strong>
            </div>           
            <div class="card-body">
                <form action="{{route('employees.update',$employee->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    @include('employees._form')
                </form>
          
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection