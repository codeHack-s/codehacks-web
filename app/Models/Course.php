<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /*
     * Fields: id, title, description, created_by(User's id), updated_by(User's id), online(boolean), created_at, updated_at*/
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'online',
        'created_by',
        'updated_by',
        'image_url'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lessons(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Lesson::class);
    }

}
