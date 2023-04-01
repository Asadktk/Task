<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'image', 'isbn', 'year', 'price', 'page_number'];

    //Relationship to user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
