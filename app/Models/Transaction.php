<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'package_id',
        'user_id',
        'amount',
        'transaction_code',
        'status'
    ];


    // relasi ke user belongsTo
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
