<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    /*
     * Payment Model:

Fields: id, user_id, amount, payment_for(subscription/course), payment_status, created_at, updated_at
    */
    protected $fillable = [
        'user_id',
        'amount',
        'payment_for',
        'payment_status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to Course
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

}
