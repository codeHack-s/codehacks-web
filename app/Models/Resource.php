<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    /*
     * Resource Model:

Fields: id, user_id, name, description, access_url, created_at, updated_at
     */

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'access_url',
        'usage_count',
        'created_by',
        'updated_by'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
