<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="createPostModalLabel">Create Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <!-- User Profile and Post Input -->
        <div class="d-flex align-items-center mb-3">
            @if (auth()->user()->image==null)
            <img src="{{asset("asset/images/ATbrxjpyc.jpg")}}" style="width: 40px; height: 40px; border-radius: 100% ;margin-right: 13px; background-color: gray">
            @else
            <img src="{{asset("storage/".auth()->user()->image)}}" style="width: 40px; height: 40px; border-radius: 100% ;margin-right: 13px">
            @endif

            <div>
                <form >
                    <h6 class="mb-0">{{auth()->user()->name}}</h6>
                    <select wire:model="privacy_setting" class="btn btn-light btn-sm">
                        <option value="friends only" selected>Friends</option>
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                    </select>
                    @error('privacy_setting')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <textarea class="form-control mb-3 border-0" wire:model="post_content" placeholder="What's on your mind, Nada?" rows="3"></textarea>
            @error('post_content')
            <p class="text-danger">{{$message}}</p>
            @enderror

            <!-- Add Media Section -->
            <div class="border p-3 rounded mb-3 text-center">
                <div class="text-center mb-2">
                    <i class="bi bi-image" style="font-size: 1.5rem;"></i>
                </div>

                <label class="ms-2 btn rounded-pill w-100 border-0 p-2">
                    <input type="file" wire:model="images" multiple style="display: none" id="fileInput">
                    <div wire:loading wire:target="images">Uploading...</div>
                </label>
                <span>Add Photos or drag and drop</span>
            </div>
        

            <!-- Preview uploaded images -->
            @if ($images)
            <div class="row row-cols-3  mb-5 " style="height: 200px">
            @foreach ($images as $image)
            
             <img src="{{ $image->temporaryUrl() }}" class="mt-3 h-100" width="40px"  >
            
          
            @endforeach
        </div>
            @endif
        </div>

        <div class="modal-footer">
            <button  wire:click="make_post" class="btn btn-primary w-100">
                <div wire:loading wire:target="make_post">Posting...</div>
                <div wire:loading.remove>Post</div>
            </button>
        </div>
    </form>
</div>
