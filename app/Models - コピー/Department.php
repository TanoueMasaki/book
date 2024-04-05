<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    use HasFactory;

    // usersとのリレーションシップ（1対多）
    // 第二引数は接続先のカラム名を入れる
    public function users(){
        return $this->hasMany(user::class,'id');
    }
}
