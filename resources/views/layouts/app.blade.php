<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <style>

            /* Style for Profile Sidebar */
.card img {
  width: 100px;
  height: 100px;
  object-fit: cover;
}

/* Style for Story Section */
.story-box {
  width: 60px;
  height: 100px;
  border: 1px dashed #ccc;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.plus-icon {
  font-size: 30px;
  color: #007bff;
}

.story img {
  width: 60px;
  height: 100px;
  object-fit: cover;
  border-radius: 8px;
}

.story p {
  text-align: center;
  font-size: 12px;
}

/* Custom Button Styles */
button {
  font-size: 14px;
}
/* Style for profile picture and post image */
img {
  object-fit: cover;
}

/* Custom style for Like and Comment buttons */
button {
  font-size: 14px;
  color: #007bff;
  background-color: transparent;
  border: none;
}

button:hover {
  text-decoration: underline;
}

/* input[type="text"] {
  border-radius: 20px;
  padding-left: 15px;
} */

.card {
  border-radius: 10px;
}
.bg-image {
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}
        </style>
        @livewireStyles
    </head>
    <body class="bg-light">
      <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container-fluid">
          <!-- Left Side: Icon and Search Bar -->
          <div class="d-flex align-items-center">
            <button class="btn btn-primary rounded-circle me-3" style="width: 40px; height: 40px;">
              <i class="bi bi-megaphone"></i>
            </button>
    
            <!-- Search Bar -->
            <div class="input-group">
              <span class="input-group-text bg-light border-0">
                <i class="bi bi-search"></i>
              </span>
              <input type="text" class="form-control bg-light border-0" placeholder="Search...">
            </div>
          </div>
    
          <!-- Right Side: Links and Icons -->
          <div class="d-flex align-items-center">
            <a href="/" class="nav-link text-dark mx-2">Home</a>
            {{-- <a href="#" class="nav-link text-dark mx-2 dropdown-toggle" data-bs-toggle="dropdown">groups</a> --}}
            {{-- <a href="#" class="nav-link text-dark mx-2 dropdown-toggle" data-bs-toggle="dropdown">Account</a> --}}
      
           @auth
                   <a href="/logout" class="nav-link text-dark mx-2">Logout</a>
           @endauth
           @guest
           <a href="/login" class="nav-link text-dark mx-2">Login</a>
           <a href="/signup" class="nav-link text-dark mx-2">Sign Up</a>
           @endguest
    
            <!-- Notification and Profile Icons -->
            @auth
            <div class="d-flex align-items-center">
              <a href="#" class="btn btn-light nav-link mx-2">
                <i class="bi bi-chat-left-text-fill"></i>
              </a>
              <a href="#" class="btn btn-light nav-link mx-2">
                <i class="bi bi-gear-fill"></i>
              </a>
              <a href="#" class="btn btn-light nav-link mx-2 position-relative">
                <i class="bi bi-bell-fill"></i>
                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
              </a>
    
              <!-- Profile Image -->
              <a href="/profile">
                 @if (auth()->user()->image==null)
  
              <img src="{{asset("asset/images/ATbrxjpyc.jpg")}}" style="width: 40px; height: 40px; border-radius: 100% ;margin-right: 13px; background-color: gray">
                @else
                <img src="{{asset("storage/".auth()->user()->image)}}" style="width: 40px; height: 40px; border-radius: 100% ;margin-right: 13px">
                @endif
              </a>
             
            </div>
            @endauth
       
          </div>
        </div>
      </nav>
        {{ $slot }}
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</html>
