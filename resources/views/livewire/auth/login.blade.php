<div class="d-flex justify-content-center align-items-center p-5"  >



<div class="container-fluid w-75" style="height: 400px">

    <div class="row h-100 p-3">
      <!-- Left Section (Form) -->
      <div class="col-md-6 d-flex justify-content-center align-items-center p-2 bg-white" style="height: 500px">
        <div class="w-75">
          {{-- <h2 class="mb-3"><strong>InsideBox</strong></h2> --}}
          {{-- <h3 class="mb-2">Start your journey</h3> --}}
          <h4 class="mb-2">Welcom Back 👋</h>
  
          <!-- Sign-up Form -->
          <form class="mt-3" wire:submit="login">
            <div class="mb-2">
              <label for="email" class="fs-6" >E-mail</label>
              <input type="email" class="form-control" id="email" wire:model="email"  placeholder="example@mail.com">
              @error("email")
                                <div class=" w-100 bg-danger rounded mb-0" style="height: 3px"> </div>
                           
                            <p class="text-danger mb-0 fs-6 font-weight-normal">{{$message}} </p>
                                
                            @enderror
            </div>
            <div class="mb-2">
              <label for="password" class="fs-6">Password</label>
              
                <input type="password" class="form-control" wire:model="password" id="password" placeholder="********">
                @error("password")
                <div class=" w-100 bg-danger rounded mb-0" style="height: 3px"> </div>
           
            <p class="text-danger mb-0 fs-6 font-weight-normal">{{$message}} </p>
                
            @enderror
              
            </div>
            <div class="d-flex justify-content-between mb-2">
               <div class="form-group d-flex align-items-center">
 <input type="checkbox" class="  me-2" id="remmber_me"  wire:model="remmber_me">
                    <label class="form-check-label fs-6 font-weight-normal" for="remmber_me">remmber me</label>
                
               </div>
               
                   
                <a href="/forgetpassword" class="fs-6 font-weight-normal ">Forget password </a>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>
  
        
  
          <div class="text-center mt-4 fs-5">
            <p>Don't Have an account? <a href="/signup">Sign Up</a></p>
           
          </div>
        </div>
      </div>
  
      <!-- Right Section (Image) -->
      <div class="col-md-6 d-none d-md-block p-0">
        <div class="bg-image" style="background-image: url('{{asset("asset/images/login.jfif")}}'); height: 500px; background-size: cover; background-position: center;"></div>
      </div>
    </div>
  </div>
</div>