<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['author', 'category'];

    // A post belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Use this if you want to use a different key for Route/model binding
    // Or you can inline it in the routes file with this alternate syntax: 
    // Route::get('post/{post:slug}', function (Post $post) {

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
