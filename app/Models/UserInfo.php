<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserInfo extends Model
{
    // use HasFactory;

    protected $fillable = [
        'user_id',
        'admin'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function entry(): BelongsTo {
        return $this->belongsTo(Entry::class);
    }
}
