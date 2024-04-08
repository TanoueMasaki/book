<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $table = 'books';

    //データ挿入の許可をするカラムを指定(許可しない設定をする場合は$guardedにする)
    protected $fillable = ['title','author','publisher','publication_Date','genre','isbn','price','con_id']; 

    use HasFactory;

    public function review(){
        return $this->hasMany(Review::class,'isbn');
    }
    public function user(){
        return $this->belongsTo(User::class,'con_id');
    }
}
