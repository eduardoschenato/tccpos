<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostCategory;
use App\Models\PostImage;

class Post extends Model
{
    use HasFactory;

    public function post_category() {
        return $this->belongsTo(PostCategory::class);
    }

    public function images() {
        return $this->hasMany(PostImage::class);
    }
}
