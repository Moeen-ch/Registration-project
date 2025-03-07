<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_no',
        'user_id',
        'price',
        'category',
        'status'
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }
}
