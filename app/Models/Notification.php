<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    /*
     * Notification Model:

Fields: id, user_id, title, message, read_status, created_at, updated_at
    */

    protected $fillable = [
        'user_id',
        'title',
        'message',
        'read_status'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
