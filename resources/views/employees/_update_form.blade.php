@extends('layouts.main')

@section('title','MINI-CRM | Settings | Edit Company')
@section('content')
    

<main class="py-5">
    <div class="container">
      <div class="row">
         
        <div class="col-md-12">
         <form action="{{route('companies.update',$company->id)}}" enctype="multipart/form-data" method="POST" >
         @include('layouts._message')
          @method('PUT')
          @csrf
          <div class="card">
            <div class="card-header card-title">
              <strong>Edit Company</strong>
            </div>           
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                      <label for="email">Name</label>
                      <input type="text" name="name" value="{{old('name',$company->name)}}" id="name" class="form-control @error('name') is-invalid @enderror">
                      @error('name')
          <div class="invalid-feedback">
            {{$message}}
           </div>
          @enderror
                  </div>

                  <div class="form-group">
                    <label for="email">EMail</label>
                    <input type="text" name="email" value="{{old('email',$company->email)}}" id="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
        <div class="invalid-feedback">
          {{$message}}
         </div>
        @enderror
                </div>

                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" name="website" value="{{old('website',$company->website)}}" id="website" class="form-control @error('website') is-invalid @enderror">
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
                              <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="logo" accept="image/*" value=""></span>
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
                      <button type="submit" class="btn btn-success">Update Profile</button>
                      <a href="{{route('companies.index')}}" class="btn btn-danger">Cancel</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         </form>
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