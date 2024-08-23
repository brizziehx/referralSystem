<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'purchase_id', 'amount_earned', 'purchaser_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'purchaser_id');
    }
}
