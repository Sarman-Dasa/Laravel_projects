<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('employee.index')}}">Add Employee</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('employee.restoreDataShow')}}">Restore Data</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('employee.index')}}">Show Data</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('image.create')}}">Add Assignment</a>
          </li>
        
        </ul>
       <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle text-success" data-bs-toggle="dropdown" aria-expanded="false">
             Welcome, {{ Auth::user()->name }}
          </a>
           <ul class="dropdown-menu">
            <li>  @auth
              <li class="nav-item">
                <a class="dropdown-item" href="{{route('user.logout')}}">logout</a>
              </li>
          @endauth</li>
          </ul>
       </li>
      </div>
    </div>
</nav>