<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // public function scopeAvgRating($query,$isbn){
    //     return $query->select('isbn_id')->selectRaw('AVG(rating) as rating')->groupBy('isbn_id')->having('isbn_id',$isbn);
    // }

    public function book(){
        return $this->belongsTo(Book::class,'isbn_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
