<?php

namespace App\Livewire;

use App\Models\post;
use App\Models\post_images;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use PhpParser\Node\Expr\Cast\String_;

class Postimages extends Component
{
    use WithFileUploads;

    #[Validate(['images.*' => 'image|max:1024'])]  // Validate that each image is a file and max size of 1MB
    public $images;

    #[Validate("required|string|min:2")]
    public $post_content;
    #[Validate("in:public,friends only,private")]  
      public $privacy_setting = 'friends only';  // Default privacy setting
    public $tags = '';
    public $post_id ;
    
 

    public function make_post()
    {
       

        // Extract hashtags from the post content
        
       
        $post = Post::create([
            "post_content" => $this->post_content,
            "privacy_setting" => $this->privacy_setting,
            "tags" => $this->tags,
            "user_id" => auth()->user()->id,
            "like_count" => 0,
            "comment_count" => 0
            ,
            "share_count" => 0
        ]);

        foreach ($this->images as $image) {
            post_images::create([
                "post_id" => $post->id,
                "image" => $image->store('images', 'public')  // Store the image in the 'photos' directory inside the 'public' disk
            ]);

       
    }
      
        

    }



    public function render()
    {

        return view('livewire.postimages');
    }
}
