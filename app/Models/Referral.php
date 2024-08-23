<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Referral extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'referrer_id', 'referred_id', 'referral_code',
    ];

    public function user() {
        $this->hasOne(User::class, 'id', 'referrer_id');
    }

    public function referrer() : BelongsTo
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function referred() : BelongsTo
    {
        return $this->belongsTo(User::class, 'referred_id');
    }

    public function calculateEarnings()
    {
        $percentage = 0.10; 
        return $this->purchases()->sum('amount') * $percentage;
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}