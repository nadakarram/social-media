<?php

namespace App\Livewire;

use App\Models\comment;
use App\Models\like;
use App\Models\post;
use App\Models\post_images;
use App\Models\share;
use App\Models\User;
use DateTime;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Posts extends Component
{
    #[Validate("required|string|min:1")]
    public $comment;
    function timeAgo($timestamp) {
        $now = new DateTime(); // Current time
        $time = new DateTime($timestamp); // Given timestamp
        $diff = $now->diff($time); // Difference between the two
    
        // Get the difference in terms of different time units
        $years = $diff->y;
        $weeks = floor($diff->days / 7); // Calculate weeks
        $days = $diff->days;
        $hours = $diff->h;
    
        // Check the conditions
        if ($years > 0) {
            return ($years === 1) ? "1 year ago" : "$years years ago";
        } elseif ($weeks >= 12) {
            return ($weeks === 1) ? "1 week ago" : "$weeks weeks ago";
        } elseif ($days >= 30) {
            return ($days < 60) ? "1 month ago" : floor($days / 30) . " months ago";
        } elseif ($days >= 1) {
            return ($days === 1) ? "1 day ago" : "$days days ago";
        } elseif ($hours >= 1) {
            return ($hours === 1) ? "1 hour ago" : "$hours hours ago";
        } else {
            return "just now";
        }
    }
   public function like($post_id){
    if(like::where("user_id",auth()->user()->id)->where("post_id",$post_id)->exists()){
        like::where("user_id",auth()->user()->id)->where("post_id",$post_id)->delete();
        $post= post::where("id",$post_id)->first();
        post::where("id",$post_id)->update([
          "like_count"=>--$post->like_count
        ]);
    }else{

       like::create([
        "user_id"=>auth()->user()->id,
        "post_id"=>$post_id
       ]);

      $post= post::where("id",$post_id)->first();
      
      post::where("id",$post_id)->update([
        "like_count"=>++$post->like_count
      ]);
    }
    $this->dispatch("addlike");

   }
   public function comments($post_id){
    $this->validate();
    comment::create([
        "post_id"=>$post_id,
        "comment"=>$this->comment,
        "user_id"=>auth()->user()->id
    ]);
    $this->dispatch("commentadd");
    $post= post::where("id",$post_id)->first();
      
    post::where("id",$post_id)->update([
      "comment_count"=>++$post->comment_count
    ]);
    $this->comment="";

   }
   #[On("addlike")]
   #[On("commentadd")]
   
    public function render()
    {
        $posts=post::orderBy("created_at","desc")->get();
        $users=User::all();
        $postimages=post_images::all();
        $shares=share::all();
        $likes=like::all();
        $comments=comment::all();

        return view('livewire.posts',["comments"=>$comments,"posts"=>$posts,"postimages"=>$postimages,"users"=>$users,"likes"=>$likes]);
    }
}
