<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }
    public function getLessonsNumberAttribute(): int
    {
        return $this->lessons()->count();
    }

    //start of course date is the earliest lesson date
    //lessons have a scheduled_time column which is a datetime 2024-12-23 15:14:59
    public function getStartDateAttribute(): string
    {
        $lessons = $this->lessons()->orderBy('scheduled_time', 'asc')->first();
        $startDate = $lessons->scheduled_time->format('Y-m-d');
        if ($startDate) {
            return $startDate;
        }
        return now()->format('Y-m-d');
    }

    //end of course date is the latest lesson date
    public function getEndDateAttribute(): string
    {
        $lessons = $this->lessons()->orderBy('scheduled_time', 'desc')->first();
        $endDate = $lessons->scheduled_time->format('Y-m-d');
        if ($endDate) {
            return $endDate;
        }
        return now()->format('Y-m-d');
    }

    public function getLessonDatesAttribute()
    {
        return $this->lessons->pluck('scheduled_time')->map(function ($datetime) {
            return $datetime->format('Y-m-d');
        });
    }
}
