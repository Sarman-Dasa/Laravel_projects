@extends('layout.main')
@section('content')
    <div>
        <ul>
            <li class="nav-item">
                <a href="/main/en" class="nav-link">English</a>
            </li>
            <li class="nav-item">
                <a href="/main/hi" class="nav-link">Hindi</a>
            </li>
            <li class="nav-item">
                <a href="/main/guj" class="nav-link">Gujarati</a>
            </li>
        </ul>
        <h1>Home Page</h1>
    </div>
    <div>
        <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('main') }}">{{__('header.home')}}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('employee.index')}}">{{__('header.addEmployee')}}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('employee.restoreDataShow')}}">{{__('header.restoreData')}}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('employee.index')}}">{{__('header.showData')}}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('image.create')}}">{{__('header.addassignment')}}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('image.index') }}">{{__('header.showUser')}}</a>
                  </li>
                </ul>
               <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle text-success" data-bs-toggle="dropdown" aria-expanded="false">
                     {{__('header.welcome',['name'=>Auth::user()->name])}}
                  </a>
                   <ul class="dropdown-menu">
                    <li>  @auth
                      <li class="nav-item">
                        <a class="dropdown-item" href="{{route('user.logout')}}">{{__('header.logout')}}</a>
                      </li>
                  @endauth</li>
                  </ul>
               </li>
              </div>
            </div>
        </nav>
    </div>
@endsection
