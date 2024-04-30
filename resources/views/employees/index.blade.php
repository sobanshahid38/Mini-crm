@extends('layouts.main')

@section('title', 'MINI-CRM || All Employees')
    

@section('content')
{{-- <h1>All contacts</h1>

<a href="{{route('contact.index')}}">All Contacts</a>
<br>
<a href="{{route('contact.create')}}">Add Contacts</a>
<br>
<a href="{{route('contact.show',2)}}">Contact one detail</a> --}}

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

@endsection


<main class="py-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
              <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h2 class="mb-0">All Employees</h2>
                  <div class="ml-auto">
                    <a href="{{route('employees.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                  </div>
                </div>
              </div>
            <div class="card-body">
           {{-- @include('companies._filter') --}}
              <table id="myTable" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>

                   @if ($employees->count())
                   @foreach ($employees as $index=>$employee )
                       
                   <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{{$employee->first_name}}</td>
                    <td>{{$employee->last_name}}</td>
                    <td>{{$employee->company->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                   
                    <td>{{$employee->created_at}}</td>
                    <td>{{$employee->updated_at}}</td>
                    <td width="200">
                      <a href="{{route('employees.show',$employee->id)}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                      <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                      
                      <form action="{{route('employees.destroy',$employee->id)}}" method="POST" style="display: initial" >
                        @csrf
                        @method('DELETE') 

                        <button type="submit" onclick="return confirm('Are you Sure You want to delete?')" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" ><i class="fa fa-times"></i></button>
                    </form>
                    </td>
                  </tr>


                   @endforeach

                  
                    
                   @endif   
                
                </tbody>

               @include('layouts._message')
              </table> 
              {{-- {{$companies->appends(request()->only('id'))->links()}} --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


@endsection



