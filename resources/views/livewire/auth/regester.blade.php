
    
  

    <div class="container-fluid p-5" style="height:max-content; background-size:cover;background-repeat: no-repeat; background-image: url({{asset("asset/images/signup.jfif")}})">
        <div class=" p-1 p-lg-3 m-0 h-100 row  gap-1 justify-content-center  align-items-start">
            <div class="col-12 col-lg-6 h-100">
                <div class="card  h-100">
                    <div class="card-body ">
                        <h5 class="card-title text-center mt-2 mb-2">Sign Up Now! 😊</h5>
                        <form class="px-5 " wire:submit="regester">
                            <div class="form-group ">
                              
                                <label for="">Name</label>
                                <input type="text" class="form-control  " placeholder="name"  id="name" wire:model="name">
                             
                                @error("name")
                                <div class=" w-100 bg-danger rounded mb-0" style="height: 3px"> </div>
                               
                                <p class="text-danger mb-0">{{$message}} </p>
                                    
                                @enderror
                            </div>
                            <div class="form-group ">
                              
                                <label for="">  Email</label>
                                <input type="email" class="form-control" placeholder="Email@gmail.com" id="email" wire:model="email">
                                @error("email")
                                    <div class=" w-100 bg-danger rounded mb-0" style="height: 3px"> </div>
                               
                                <p class="text-danger mb-0">{{$message}} </p>
                                    
                                @enderror
                            </div>
                           
                            <div class="form-group ">
                              
                                <label for="">Password</label>
                                <input type="password" class="form-control" placeholder="*** *** ***" id="password" wire:model="password">
                                @error("password")
                                    <div class=" w-100 bg-danger rounded mb-0" style="height: 3px"> </div>
                               
                                <p class="text-danger mb-0">{{$message}} </p>
                                    
                                @enderror
                            </div>
                         

                            
                            <div class="form-check mt-1">
                                <input type="checkbox" class="form-check-input @error("terms")
                                    is-invalid
                                @enderror " id="terms"  wire:model="terms">
                                <label class="form-check-label" for="terms">I agree with Terms & Conditions</label>
                            </div>
                           
                            <button type="submit" class="btn btn-primary w-100 mt-4">
                                <span wire:loading wire:target='regester'>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </span>
                                <div wire:loading.delay.remove wire:target='regester'> Sign Up</div>

                               </button>
                        </form>
                        <hr>
                       
                        <p class="text-center mt-3 mb-0">Already have an account? <a href="/login">Sign in</a></p>
                    </div>
                </div>
            </div>
            {{-- <div class="col-0 col-lg-5"></div> --}}
        </div>
    </div>


