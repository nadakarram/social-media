<div class="card p-3 mb-3 border-0"  >
  @if ($massage!="")
     <div class="alert alert-success d-flex justify-content-between align-items-center">
    {{$massage}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div> 
  @endif

    <div class="d-flex">
      @if (auth()->user()->image==null)
  
      <img src="{{asset("asset/images/ATbrxjpyc.jpg")}}" style="width: 40px; height: 40px; border-radius: 100% ;margin-right: 13px; background-color: gray">
        @else
        <img src="{{asset("storage/".auth()->user()->image)}}" style="width: 40px; height: 40px; border-radius: 100% ;margin-right: 13px">
        @endif
               <textarea class="form-control mb-3  border-0" wire:model="post_content" placeholder="Share your thoughts..." wire:model="post_content"></textarea>
    </div>
    
    <div class="d-flex justify-content-between">
      <div>
      {{-- <a href="/postimage">photo</a> --}}
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#createPostModal">
          <i class="bi bi-image"></i> Photo
        
        </button>
      
        <!-- Modal -->
        <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
@livewire("postimages")
          </div>
        </div>
        {{-- <button class="btn btn-light"><i class="bi bi-camera-video"></i> Video</button>
        <button class="btn btn-light"><i class="bi bi-calendar-event"></i> Event</button>
        <button class="btn btn-light"><i class="bi bi-emoji-smile"></i> Feeling/Activity</button> --}}
      </div>
      <button class="btn btn-primary" wire:click="make_post">Post</button>
    </div>
</div>
