<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
#[Layout("layouts.no")]
class ProfileEdting extends Component
{  use WithFileUploads;
    #[Validate("required|min:2|string")]
    public $name;
    #[Validate("required|email")]
    public $email;

    #[Validate("required|min:16|integer")]
    public $age;
    #[Validate("required|max:70|string")]
    public $jop_title;
    #[Validate("required|min:11|string")]
    public $description;
    #[Validate(["image"])]
    public $edtedimage;
    public $image;

    public $user;
    public $massage="";
    function mount(User $user){
        $this->user=User::where("id",auth()->user()->id)->first();
        $this->name=$this->user->name;
        $this->jop_title=$this->user->jop_title;
        $this->description=$this->user->description;
        
        $this->age=$this->user->age;
        $this->email=$this->user->email;
        $this->image=$this->user->image;


    }
    // function changeimage(){
    //     $this->validateOnly($this->edtedimage);
    //     User::where("id",auth()->user()->id)->update([
    //         "image"=>$this->edtedimage?->store("uplouds/profile","public"),]);
    //         $this->massage="image change correctly";
    // }
     function updateUserData(){
        $this->validate();
        // dd("upated");
        User::where("id",auth()->user()->id)->update([
            "name"=>$this->name,
            "age"=>$this->age,
            "description"=>$this->description,
            "email"=>$this->email,
          
            "jop_title"=>$this->jop_title,
            // "image"=>$this->edtedimage?->store("uplouds/profile","public"),
        ]);
      $this->massage="change correctly";

     }
 
    public function render()
    {
        return view('livewire.profile-edting');
    }
}
