<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
      
    ];


    // Define the belongsTo relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
