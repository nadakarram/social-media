<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'privacy_setting',
        'post_content',
        "image",
        "tags",
        "like_count",
        "comment_count"
    ];
}
