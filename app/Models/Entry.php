<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Entry extends Model
{
    // use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'entry_date',
        'hours',
        'description',
    ];

    /**
     * Get the user associated with the Entry
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function job(): HasOne
    {
        return $this->hasOne(JobCode::class, 'id', 'job_id');
    }

    /**
     * Get all of the approvals for the Entry
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function approvals(): HasMany
    {
        return $this->hasMany(Approval::class, 'entry_id', 'id');
    }

}
