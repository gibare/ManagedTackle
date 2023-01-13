<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tackle extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tackle_name',
        'maker_name',
        'genre_name',
        'amount',
        'purchase_date',
        'purchase_fee',
        'detailed_info',
        'tackle_photo',
        'stock_check',
        'fish_category',
        'size',
        'weight',
        'condition',
        'fishing_date',
        'share_stock',
        'deleted_flag',
        'good_action_amount',
        'user_id',
    ];


    //1つのタックルは1人のユーザーに属する
    public function users() {
        return $this->belongsTo(User::class);
    }

    // 1つのタックルは複数のいいねを獲得する可能性がある

    public function goods() {
        return $this->hasMany(Good::class);
    }
}
