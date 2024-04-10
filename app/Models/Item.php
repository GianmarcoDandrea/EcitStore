<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $fillable = ['name' , 'user_id' , 'category_id' , 'description' , 'price' , 'image'];

    public function user() {
        return $this->belongTo(User::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function categories() {
        return $this->belongTo(Category::class);
    }
}
