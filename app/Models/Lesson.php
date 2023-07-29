<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    /*
     * Lesson Model:

Fields: id, course_id, title, description, venue(if physical), date, registered_members_count, attending_members_count, created_at, updated_at*/

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'venue',
        'date',
        'registered_members_count',
        'attending_members_count'
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

}
