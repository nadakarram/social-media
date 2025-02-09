<div class="col-md-3">
    <div class="card text-center p-3 m-auto  border-0 d-flex justify-content-center">
      @if (auth()->user()->image==null)
      <div class="">
        <img src="{{asset("asset/images/ATbrxjpyc.jpg")}}" style="width: 60px; height: 60px; border-radius: 100% ;margin-right: 13px; background-color: gray">
      </div>
  
      
        @else
        <div class="">
           <img src="{{asset("storage/".auth()->user()->image)}}" style="width: 40px; height: 40px; border-radius: 100% ;margin-right: 13px">
        </div>
       
        @endif
      {{-- <img src="{{asset("asset/images/Image 63.png")}}" class="rounded-circle mx-auto d-block mb-3" alt="Profile Image"> --}}
      <h5>{{auth()->user()->name}}</h5>
      <p>{{auth()->user()->jop_title}}</p>
      <p>{{auth()->user()->description}}</p>
      <div class="d-flex justify-content-around">
        <div>
          <strong>{{ $posts->where('user_id', auth()->user()->id)->count()}}</strong>
          <p>Post</p>
        </div>
        <div>
          <strong>0</strong>
          <p>Followers</p>
        </div>
        <div>
          <strong>0</strong>
          <p>Following</p>
        </div>
      </div>
      <hr>
      <ul class="list-unstyled text-left">
        <li class="mb-3" >🔔 <a href="#" class="text-dark ms-3 ">   Notifcation</a></li>
        <li class="mb-3">🙍‍♂️ <a href="#" class="text-dark ms-3">    Connections</a></li>
        <li class="mb-3">🌏  <a href="#"class="text-dark ms-3">    Latest News</a></li>
        <li class="mb-3">⚙ <a href="#"class="text-dark ms-3">      Setting</a></li>
        <li class="mb-3">💭  <a href="#"class="text-dark ms-3">    Groups </a></li>
      </ul>
      <hr>
      {{-- {{$page}} --}}
      @if($page=="home")
      <a class="text-primary" href="/profile">View Profile</a>
      @endif
    </div>
  </div>
