
  <div class="container mt-5">
    <div class="row">
      <!-- Profile Sidebar -->
      {{-- <div class="col-md-3">
        <div class="card text-center p-3">
          <img src="https://via.placeholder.com/100" class="rounded-circle mx-auto d-block mb-3" alt="Profile Image">
          <h5>Sam Lanson</h5>
          <p>Web Developer at Webestica</p>
          <p>"I'd love to change the world, but they won’t give me the source code."</p>
          <div class="d-flex justify-content-around">
            <div>
              <strong>256</strong>
              <p>Post</p>
            </div>
            <div>
              <strong>2.5K</strong>
              <p>Followers</p>
            </div>
            <div>
              <strong>365</strong>
              <p>Following</p>
            </div>
          </div>
          <hr>
          <ul class="list-unstyled">
            <li><a href="#">Feed</a></li>
            <li><a href="#">Connections</a></li>
            <li><a href="#">Latest News</a></li>
          </ul>
        </div>
      </div> --}}
      {{-- @livewire('', ['user' => $user], key($user->id)) --}}
      @livewire("profilebref" , ['page'=>'home'])
      {{-- <livewire:profilebref :page='home'> --}}

      <!-- Main Content Area -->
      <div class="col-md-6">
      
        <!-- Post Input -->
       @livewire("addpost")

        <!-- Example Post -->
        {{-- <div class="card mb-3 p-3">
          <div class="d-flex">
            <img src="{{asset("asset/images/Image 63.png")}}" class="rounded-circle me-2" alt="Frances Guerrero">
            <div>
              <strong>Frances Guerrero</strong>
              <p class="text-muted">2 hours ago</p>
              <p class="mb-0">I'm thrilled to share that I've completed a graduate certificate course in project management with the president's honor roll.</p>
            </div>
          </div>
        </div> --}}
        <div class="d-flex justify-content-center ">
        @livewire("posts")
        </div>
      </div>

      <!-- Who to Follow Sidebar -->
      <div class="col-md-3">
        <div class="card p-3 border-0">
          <h6>Who to follow</h6>
          <div class="d-flex align-items-center mb-2">
            <img src="{{asset("asset/images/Image 63.png")}}" style="width: 50px; height: 50px; border-radius: 100% ;margin-right: 13px; margin-bottom: 10px">
            <div>
              <p class="mb-0">Frances Guerrero</p>
              <small class="text-muted">News anchor</small>
            </div>
            <button class="btn btn-primary ms-auto">+</button>
          </div>

          <div class="d-flex align-items-center mb-2">
            <img src="{{asset("asset/images/Image 63.png")}}" style="width: 50px; height: 50px; border-radius: 100% ;margin-right: 13px; margin-bottom: 10px">
            <div>
              <p class="mb-0">Lori Ferguson</p>
              <small class="text-muted">Web Developer</small>
            </div>
            <button class="btn btn-primary ms-auto">+</button>
          </div>

          <div class="d-flex align-items-center mb-2">
            <img src="{{asset("asset/images/Image 63.png")}}" style="width: 50px; height: 50px; border-radius: 100% ;margin-right: 13px; margin-bottom: 10px">
            <div>
              <p class="mb-0">Samuel Bishop</p>
              <small class="text-muted">News anchor</small>
            </div>
            <button class="btn btn-primary ms-auto">+</button>
          </div>

          <div class="d-flex align-items-center mb-2">
            <img src="{{asset("asset/images/Image 63.png")}}" style="width: 50px; height: 50px; border-radius: 100% ;margin-right: 13px; margin-bottom: 10px">
            <div>
              <p class="mb-0">Dennis Barrett</p>
              <small class="text-muted">Web Developer</small>
            </div>
            <button class="btn btn-primary ms-auto">+</button>
          </div>

          <div class="d-flex align-items-center">
            <img src="{{asset("asset/images/Image 63.png")}}" style="width: 50px; height: 50px; border-radius: 100% ;margin-right: 13px; margin-bottom: 10px">
            <div>
              <p class="mb-0">Judy Nguyen</p>
              <small class="text-muted">News anchor</small>
            </div>
            <button class="btn btn-primary ms-auto">+</button>
          </div>
          <a href="#" class="text-center d-block mt-3">View more</a>
        </div>
      </div>
    </div>
  </div>

 

