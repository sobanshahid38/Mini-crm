<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>@yield('title','Contact App')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    @yield('styles')
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand text-uppercase" href="{{url('/')}}">            
            <strong>MINI-CRM</strong> App
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            
        <!-- /.navbar-header -->
        <div class="collapse navbar-collapse" id="navbar-toggler">
          <ul class="navbar-nav">
              @auth
            
              @endauth

             
                 
              <li class="nav-item {{request()->segment(1) =='companies' ? 'active' : ""}}"><a href="{{route('companies.index')}}" class="nav-link">Companies</a></li>
              <li class="nav-item {{request()->segment(1) =='employees' ? 'active' : ""}}"><a href="{{route('employees.index')}}" class="nav-link">Employees</a></li>    
             
           
          </ul>
          <ul class="navbar-nav ml-auto">


            @if (auth()->user() ==null)
            <li class="nav-item mr-2"><a href="{{route('login_form')}}" class="btn btn-outline-secondary">Login</a></li>
            @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               {{auth()->user()->name}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                {{-- <a class="dropdown-item" href="{{route('settings.profile.edit')}}">Settings</a> --}}
            
                <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <x-responsive-nav-link :href="route('logout')"
                          onclick="event.preventDefault();
                                      this.closest('form').submit();">
                      {{ __('Log Out') }}
                  </x-responsive-nav-link>
              </form>
                {{-- <a href="{{route('logout')}}"   --}}
                {{-- onclick="event.preventDefault();
               document.getElementById('logout-form').submit();"--}} 
               {{-- >{{__('Logout') }}</a> --}}
            @endif

              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    {{--content  --}}
    @yield('content')

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
   
   @yield('scripts')
  </body>
</html>