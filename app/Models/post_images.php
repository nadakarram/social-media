<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_images extends Model
{
    use HasFactory;
    protected $fillable=[
        "post_id",
        "image"
    ];
}
