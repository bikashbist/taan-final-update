<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    use HasFactory;
    protected $fillable = ['image_path', 'user_id', 'blog_id','post_unique_id'];
}
