<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillabale = ["user_id", "thumbnail", "title", "slug", "sub_title", "details", "is_published"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class, "category_posts");
    }
}
