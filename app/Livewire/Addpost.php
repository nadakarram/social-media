<?php

namespace App\Livewire;

use App\Models\post;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Addpost extends Component
{
    
    public $post_content;
    public $privacy_setting = 'public';  // Default privacy setting
    public $tags = '';
    public $massage="";
 

    public function make_post()
    {
        // Validate the form input (including images)
        $this->validate([
            'post_content' => 'required|string|min:2',
            'privacy_setting' => 'in:public,friends only,private',
            // Validate each file is an image with max 1MB size
        ]);

        // Extract hashtags from the post content
        if (preg_match_all('/#(\w+)/', $this->post_content, $matches)) {
            $tags_all = $matches[0];  // Extract hashtags
            $this->tags = implode(', ', $tags_all);  // Join hashtags with comma separator
        }
       
        // Create a new post record
        $post = post::create([
            "post_content" => $this->post_content,
            "privacy_setting" => $this->privacy_setting,
            "tags" => $this->tags,
            "user_id" => auth()->user()->id,
            "like_count" => 0,
            "comment_count" => 0,
            "share_count" => 0
        ]);


      $this->massage="post added 😊😊✨";
      $this->post_content="";
      
        // dd("done");

    }

    public function render()
    {
        return view('livewire.addpost');
    }
}
