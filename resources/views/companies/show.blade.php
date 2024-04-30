

@extends('layouts.main')

@section('title','MINI-CRM | Company Details')
@section('content')
    

<main class="py-5">
    <div class="container">
      <div class="row">
         
        <div class="col-md-12">
        
          <div class="card">
            <div class="card-header card-title">
              <strong> Company</strong>
            </div>           
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                      <label for="email">Name</label>
                      <input disabled type="text" name="name" value="{{old('name',$company->name)}}" id="name" class="form-control @error('name') is-invalid @enderror">
                      @error('name')
          <div class="invalid-feedback">
            {{$message}}
           </div>
          @enderror
                  </div>

                  <div class="form-group">
                    <label for="email">EMail</label>
                    <input disabled type="text" name="email" value="{{old('email',$company->email)}}" id="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
        <div class="invalid-feedback">
          {{$message}}
         </div>
        @enderror
                </div>

                <div class="form-group">
                    <label for="website">Website</label>
                    <input disabled type="text" name="website" value="{{old('website',$company->website)}}" id="website" class="form-control @error('website') is-invalid @enderror">
                    @error('website')
        <div class="invalid-feedback">
          {{$message}}
         </div>
        @enderror
                </div>




                
                </div>
                <div class="offset-md-1 col-md-3">
                  <div class="form-group">
                      <label for="bio">Profile picture</label>
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new img-thumbnail" style="width: 150px; height: 150px;">
                              <img src="{{ $company->LogoUrl() }}"  alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 150px; max-height: 150px;"></div>
                          <div class="mt-2">
                              <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="logo" accept="image/*" disabled value="{{old('...',$company->logo)}}"></span>
                              <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                          </div>
                      </div>
                      @error('profile_picture')
                      <div class="text-danger">
                        {{$message}}
                       </div>
                      @enderror
                    </div>
                      
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                      <a href="{{route('companies.edit',$company->id)}}" class="btn btn-info">Edit</a>

                      <form action="{{route('companies.destroy',$company->id)}}" method="POST" style="display: initial" >
                        @csrf
                        @method('DELETE') 

                        <button type="submit" onclick="return confirm('Are you Sure You want to delete?')" class=" btn btn-outline-danger" title="Delete" >Delete</i></button>
                    </form>

                     
                      <a href="{{route('companies.index')}}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
       
        </div>
      </div>
    </div>
  </main>


@endsection

@section('styles')
<link href="{{asset('css/jasny-bootstrap.min.css')}}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{asset('js/jasny-bootstrap.min.js')}}"></script> 
@endsection