<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $fillable =['user_id','tackle_id'];

    //いいねは1人のユーザーに属する
     public function users(){
         return $this->belongsTo(User::class);
     }

    //いいねは1つのタックルに紐づく

     public function tackles(){
        return $this->belongsTo(Tackle::class);
    }
}
