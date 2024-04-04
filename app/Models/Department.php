<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    use HasFactory;

    // usersとのリレーションシップ（1対多）
    public function users(){
        return $this->hasMany(user::class);
    }
}
