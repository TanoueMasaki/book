<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function review(){
        return $this->hasMany(Review::class,'isbn');
    }
    public function user(){
        return $this->belongsTo(User::class,'con_id');
    }
}
