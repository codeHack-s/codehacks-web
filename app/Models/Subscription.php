<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    /*
     * Fields: id, name(free, basic, premium, pro), price, description, created_at, updated_at
     * */

    protected $fillable = [
        'name',
        'price',
        'description'
    ];

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }

}
