<div class="modal-content">
  
    <div class="modal-header">
      <h5 class="modal-title" id="createPostModalLabel">All Comments</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <div class="col-12 p-0 ">
        <!-- Post Card -->
        <div class="card  mb-3  border-0">
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
                            <span class="nav-item small ms-4">
                              
                              {{-- {{$timeago}} --}}
                            </span>
                        </div>
                        <p class="mb-0 small">{{$jop_title?? "no jop title"}}</p>
                    </div>
                      
                    @endif
                      
                    @endforeach
                </div>
</div>
          <p >{{$post->post_content}}</p>
          <div class="row row-cols-2">
           
          
          @foreach ($postimages as $postimage )
          @if ($postimage->post_id==$post->id)
              <div class="">
                <img src="{{asset("storage/".$postimage->image)}}" class="img-fluid  mb-2 w-100 " style="height: 250px" alt="Post Image">
            </div>
  
            
          @endif
            
          @endforeach
         </div>
         @foreach ($comments as $comment )
         @if ($comment->post_id==$post_id)
             <div class="comment-container bg-light p-3 mb-3 rounded shadow-sm">
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
                  {{-- <div class="d-flex align-items-center text-muted">
                    
                      <a href="#" class="me-3 text-decoration-none">
                          <i class="bi bi-reply"></i> Reply
                      </a>
                    
                  </div> --}}
              </div>
          </div>
      </div>
         @endif
        
         @endforeach
    
      
          
          <!-- Like and Comment Section -->
         
  
          <!-- Comment Input -->
         
        </div>
      </div>
    </div>
 
    <div class="modal-footer">
      {{-- <input type="submit"  class="btn btn-primary w-100"  value="Post"> --}}
      {{-- <button wire:loading wire:target="make_post" class="  bg-slate-300 px-6 py-2 rounded-2 text-black cursor-pointer hover:bg-stone-200   align-items-center " style="height: 90px;justify-content: space-evenly;">
        looding
      </button> --}}
      <form class="w-100" wire:submit="comments({{$post->id}})" >
        <div class="d-flex mt-3 align-items-center">
          <img src="{{asset("asset/images/Image 63.png")}}" style="width: 40px; height: 40px; border-radius: 100% ;margin-right: 13px">
            
          <input type="text" class="form-control" placeholder="Add a comment..." wire:model="comment">
          <button type="submit" class="btn btn-dark ms-1"><i class="bi bi-send"></i></button>
        </div></form>
   
    </div>

  </div>