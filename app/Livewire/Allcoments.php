<?php

namespace App\Livewire;

use App\Models\comment;
use App\Models\like;
use App\Models\post;
use App\Models\post_images;
use App\Models\User;
use DateTime;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Allcoments extends Component
{
    public $post_id;  
  
      #[Validate("required|string|min:1")]
    public $comment;
    public function mount($post_id,){
        $this->post_id=$post_id;
        
       


    }

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


public function render()
    {
        $post=post::where("id",$this->post_id)->first();
        $postimages=post_images::where("post_id",$this->post_id)->get();
        $likes=like::all();
        $users=User::all();
        $comments=comment::where("post_id",$this->post_id)->get();
        return view('livewire.allcoments',["post"=>$post,"postimages"=>$postimages,"users"=>$users,"likes"=>$likes,"comments"=>$comments]);
    }
}
