
<div class="container-fluid p-0 mt-0 my-5">
    <div class="bg-danger w-100  position-relative mb-5" style="height: 300px;background-repeat: no-repeat;background-size: cover; background-image: url({{asset("asset/images/login.jfif")}});">
      <div class="mt-3 " style="position:absolute;right:2%;top:0%">
        <a href="/profileedit/{{auth()->user()->id}}"><i class="fas fa-edit"></i></a>
        </div>  
      
      <div class="text-center" style="position: absolute;bottom: -30%;left:2%;">
            @if (auth()->user()->image==null)
  
        <img src="{{asset("asset/images/ATbrxjpyc.jpg")}}" style="width: 200px; height: 200px; border-radius: 100% ;margin-right: 13px; background-color: gray">
          @else
          <img src="{{asset("storage/".auth()->user()->image)}}" style="width: 200px; height: 200px; border-radius: 100% ;margin-right: 13px">
          @endif
          <div>
            <h5 class="mb-0 ">{{$userdata->name}}</h5>
            <small class="text-muted">{{$userdata->email}}</small>
        </div>

        </div>



    </div>
    <!-- Profile Section -->
    {{-- <div class="d-flex align-items-center justify-content-between mb-4 bg-primary p-5 mt-0">
       <div class="">
        @if (auth()->user()->image==null)
  
        <img src="{{asset("asset/images/ATbrxjpyc.jpg")}}" style="width: 40px; height: 40px; border-radius: 100% ;margin-right: 13px; background-color: gray">
          @else
          <img src="{{asset("storage/".auth()->user()->image)}}" style="width: 40px; height: 40px; border-radius: 100% ;margin-right: 13px">
          @endif
        <div>
            <h5 class="mb-0">{{$userdata->name}}</h5>
            <small class="text-muted">{{$userdata->email}}</small>
        </div>
       </div>
       <div class="">
        <a href="/changepassword" class="btn btn-purple-outline">change password</a>
       </div>
    </div> --}}

    <div class="container">
        <div class="row w-100   " style="margin-top:100px">
        {{-- info --}}
        
        
        <livewire:profilebref :page='99'>
  

       
        {{-- posts --}}
        <div class="col-md-6">
           @foreach ($posts as $post )
            @if ($post->user_id==auth()->user()->id)
            <div class="col-12 p-0 ">
              <!-- Post Card -->
              <div class="card p-3 mb-3  border-0"  >
                  <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex align-items-center mb-4">
                          @foreach ($users as $user )
                          @if ($user->id==$post->user_id)
                          @if ($user->image==null)
          
                          <img src="{{asset("asset/images/ATbrxjpyc.jpg")}}" style="width: 40px; height: 40px; border-radius: 100% ;margin-right: 13px; background-color: gray">
                            @else
                            <img src="{{asset("storage/".auth()->user()->image)}}" style="width: 40px; height: 40px; border-radius: 100% ;margin-right: 13px">
                            @endif
                          
                     
                          <div>
                              <div class="nav nav-divider">
                                  <h6 class="nav-item card-title mb-0">
                                      <span role="button">{{$user->name}}</span>
                                  </h6>
                                  
                                  <span class="nav-item small ms-4">{{$this->timeAgo($post->created_at)}}</span>
                              </div>
                              <p class="mb-0 small">{{$jop_title?? "no jop title"}}</p>
                          </div>
                            
                          @endif
                            
                          @endforeach
                      </div>
                      <div class="dropdown">
                          <a class="text-secondary btn btn-secondary-soft-hover py-1 px-2 content-none dropdown-toggle" id="cardFeedAction" aria-expanded="false"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"></path></svg></a></div></div>
                <p >{{$post->post_content}}</p>
                {{-- <div class="row row-cols-2 gap-1">
                 
                
                @foreach ($postimages as $postimage )
        
                @if ($postimage->post_id==$post->id)
                    <div class="">
                      <img src="{{asset("storage/".$postimage->image)}}" class="img-fluid  mb-2 w-100 " style="height: 250px" alt="Post Image">
                  </div>
        
                  
                @endif
                  
                @endforeach
               </div> --}}
               <div class="row ">
                @php
                    $postImagesCount = $postimages->where('post_id', $post->id)->count();
                @endphp
        
                {{-- @if ($postImagesCount == 1)
                <div class="row row-cols-2 gap-1">
        jjjj
                
                    @foreach ($postimages as $postimage )
            
                    @if ($postimage->post_id==$post->id)
                        <div class="">
                            
                            {{$postimage->image}}
                          <img src="{{asset("storage/".$postimage->image)}}" class="img-fluid  mb-2 w-100 " style="height: 250px" alt="Post Image">
                      </div>
                    @endif
                    @endforeach
                </div> 
            
                      --}}
            
                @if ($postImagesCount == 2)
                    <div class="row">
                        @foreach ($postimages as $postimage)
                        
                            @if ($postimage->post_id == $post->id)
                                <div class="col-6 p-1">
                                    <img src="{{ asset('storage/' . $postimage->image) }}" class="img-fluid mb-2 w-100" style="height: 250px;" alt="Post Image">
                                </div>
                            @endif
                        @endforeach
                    </div>
            
                @elseif ($postImagesCount == 3)
                    <div class="col-12">
                        <div class="row">
                         
        
        
                            @foreach ($postimages->where("post_id",$post->id)->take(2) as $postimage)
                          
                           
                            
        
                                
        
        
        
                                <div class="col-md-6 p-1">
                                        <img src="{{ asset('storage/' . $postimage->image) }}" class="img-fluid mb-1 w-100" style="height: 250px;" alt="Post Image">
                                    </div>
                               
                                
                               
                            
                            @endforeach
                            <div class="col-12 p-1">
                              <img src="{{ asset('storage/' . $postimages->where('post_id', $post->id)->skip(2)->first()->image) }}" class="img-fluid mb-2 w-100" style="height: 250px;" alt="Post Image">
        
                            </div>
                            
                        </div>
                    </div>
            
                @elseif ($postImagesCount == 4)
                    <div class="col-12">
                        
                        <div class="row">
                            @foreach ($postimages as $postimage)
                                @if ($postimage->post_id == $post->id)
                                    <div class="col-6 p-1">
                                        <img src="{{ asset('storage/' . $postimage->image) }}" class="img-fluid mb-2 w-100" style="height: 250px;" alt="Post Image">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
            
                @elseif ($postImagesCount > 4)
                    <div class="col-12">
                        
                        <div class="row gap-0">
                            @foreach ($postimages->where("post_id",$post->id)->take(3) as $postimage)
                                @if ($postimage->post_id == $post->id)
                                    <div class="col-6 p-1">
                                        <img src="{{ asset('storage/' . $postimage->image) }}" class="img-fluid mb-2 w-100" style="height: 250px;" alt="Post Imagenada">
                                    </div>
                                @endif
                            @endforeach
                            <div class="col-6 p-1 position-relative">
                                <img src="{{ asset('storage/' . $postimages->where('post_id', $post->id)->skip(3)->first()->image) }}" class="img-fluid mb-2 w-100" style="height: 250px;" alt="Post Image">
                                <div style="width:inherit; height: 250px;background: rgba(0,0,0,0.5);" class=" mt-1 ps-2 position-absolute top-0 start-0 d-flex justify-content-center align-items-center">
                                    <span class="text-white">+{{ $postImagesCount - 4 }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            
                
                <!-- Like and Comment Section -->
                <div class="d-flex justify-content-between">
                  <div>
                    {{-- <i class="bi bi-ha"> </i> --}}
                    <button class="btn "wire:click="like({{$post->id}})"><i class="bi bi-hand-thumbs-up<?php
                      foreach ($likes as $like) {
                        if($like->post_id==$post->id&& $like->user_id==auth()->user()->id){
                          echo "-fill text-primary";
        
                        }
                      }
                      
                      ?>"></i> Liked ({{$post->like_count}})</button>
                       <button  class="btn " data-bs-toggle="modal" data-bs-target="#createPostModal{{$post->id}}">
                        <i class="bi bi-chat"></i> Comments ({{$post->comment_count}})
                      
                      </button>
                    
                      <!-- Modal -->
                      <div class="modal fade" id="createPostModal{{$post->id}}" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        
                          @livewire("allcoments",['post_id'=>$post->id])
                          {{-- <livewire:allcoments :post_id=""  /> --}}
                        </div>
                      </div>  
                    {{-- <button class="btn"><i class="bi bi-chat"></i> Comments ({{$post->comment_count}})</button> --}}
                  </div>
                  <div>
                      <button class="btn "><i class="bi bi-hand-thumbs-up"></i> Share (
                      {{$post->share_count}}
                      )</button>
                  </div>
                </div>
        
                <!-- Comment Input -->
                @foreach ($comments as $comment )
        
                @if ($comment->post_id==$post->id)
                    <div class="comment-container bg-light p-3 mb-3 rounded shadow-sm mt-5">
                 <div class="d-flex align-items-start">
                     <!-- Profile Image -->
                     @foreach ($users as $user )
                     @if ($user->id==$comment->user_id)
                     @if ($user->image==null)
         
                     <img src="{{asset("asset/images/ATbrxjpyc.jpg")}}" style="width: 40px; height: 40px; border-radius: 100% ;margin-right: 13px; background-color: gray">
                       @else
                       <img src="{{asset("storage/".$user->image)}}" style="width: 40px; height:40px; border-radius: 100% ;margin-right: 13px">
                       @endif
        
                      
                 
                     
                   
                     
                     <!-- Comment Content -->
                     <div class="w-100">
                         <!-- Username and Time -->
                         <div class="d-flex justify-content-between align-items-center mb-2">
                             <h6 class="m-0">{{$user->name}}</h6>
                             <small class="text-muted">{{$this->timeAgo($comment->created_at)}}</small>
                         </div>
                 @endif
                     @endforeach
                         <!-- Comment Text -->
                         <p class="mb-2">{{$comment->comment}}</p>
                         
                         <!-- Like, Reply, and View Replies -->
                         <div class="d-flex align-items-center text-muted">
                           
                             <a href="#" class="me-3 text-decoration-none">
                                 <i class="bi bi-reply"></i> Reply
                             </a>
                           
                         </div>
                     </div>
                 </div>
             </div>
                @endif
               
                @endforeach
           
             
                <form action="" wire:submit="comments({{$post->id}})" >
                <div class="d-flex mt-3 align-items-center">
                  <img src="{{asset("asset/images/Image 63.png")}}" style="width: 40px; height: 40px; border-radius: 100% ;margin-right: 13px">
                    
                  <input type="text" class="form-control" placeholder="Add a comment..." wire:model="comment">
                  <button type="submit" class="btn btn-dark ms-1"><i class="bi bi-send"></i></button>
                </div></form>
              </div>
            </div>
              
           
            @endif
             
           @endforeach


        </div>
        {{-- frinds --}}
        <div class="col-md-3">
            <div class="card p-3 border-0">
                <h6>Frinds</h6>
                @foreach ($frineds  as $frined )
                @if ($frindscount==0)
                <p class="text-center">No Frinds Yet</p>
                    
                @endif
                @foreach ($users as $user )
                @if ($user->id==$frinds->folow_user2_id)
                <div class="d-flex align-items-center mb-2">
                    <img src="{{asset("storage/".$user->image)}}" style="width: 50px; height: 50px; border-radius: 100% ;margin-right: 13px; margin-bottom: 10px">
                    <div>
                      <p class="mb-0">{{$user->name}}</p>
                      <small class="text-muted">{{$user->jop_title}}</small>
                    </div>
                    {{-- <button class="btn btn-primary ms-auto" wire:click="send_frind_request">+</button> --}}
                  </div>
                @endif
                    
                @endforeach

                    
                @endforeach
                {{-- <div class="d-flex align-items-center mb-2">
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
                </div> --}}
                <a href="#" class="text-center d-block mt-3">View more</a>
              </div>

        </div>
    </div> 
    </div>
   
   
   
</div>
