<?php

namespace App\Livewire;


use App\Models\comment;
use App\Models\friend;
use App\Models\like;
use App\Models\post;
use App\Models\post_images;
use App\Models\User;
use DateTime;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout("layouts.app")]
class Profile extends Component
{
 
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
        $user=User::where("id",auth()->user()->id)->first();
        $posts=post::where("user_id",auth()->user()->id)->get();
        $comments=comment::all();
        $likes=like::all();
        $users=User::all();
        $postimages=post_images::all();
        $frindscount=friend::where("user_id",auth()->user()->id)->count();
        $frineds=friend::where("user_id",auth()->user()->id)->get();

       
        return view('livewire.profile',["postimages"=>$postimages,"frindscount"=>$frindscount,"comments"=>$comments,"posts"=>$posts,"frineds"=>$frineds,"likes"=>$likes,"userdata"=>$user,"users"=>$users]);
    }
}
