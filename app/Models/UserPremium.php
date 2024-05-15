<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPremium extends Model
{
    use HasFactory;

    protected $table = 'user_premium_tables';

    protected $fillable = [
        'package_id',
        'user_id',
        'end_of_subscription'
    ];

    public function Package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
