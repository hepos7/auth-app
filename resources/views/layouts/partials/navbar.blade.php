<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>
  
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{ url('/') }}" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="{{ url('/dashboard') }}" class="nav-link px-2 text-white">Dashboard</a></li>
          @auth
          
            @can('users.index')
              <li><a href="{{ route('users.index') }}" class="nav-link px-2 text-white">Users</a></li>
            @endcan
            @can('roles.index')
            <li><a href="{{ route('roles.index') }}" class="nav-link px-2 text-white">Roles</a></li>
            @endcan
          <li><a href="{{ url('/profile') }}" class="nav-link px-2 text-white">Profile</a></li>
        @endauth
        </ul>
  
  
        @auth
          {{auth()->user()->first_name .' '. auth()->user()->last_name}}
          <div class="text-end">
            <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
          </div>
        @endauth
  
        @guest
          <div class="text-end">
            <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
            <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
          </div>
        @endguest
      </div>
    </div>
  </header>