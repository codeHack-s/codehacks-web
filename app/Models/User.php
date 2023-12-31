<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'phone_number',
        'subscription_status',
        'last_login_at',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }

    public function innovate_courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class)->withPivot('role');
    }

    public function enrolledCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'enrollments')->withTimestamps();
    }


    // Relationship to Payments
    public function innovate_payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    // Relationship to Ratings given by this user
    public function givenRatings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    // Relationship to Ratings received by this user (as a tutor)
    public function receivedRatings(): HasMany
    {
        return $this->hasMany(Rating::class, 'tutor_id');
    }

    // Relationship to Interviews (as a tutor)
    public function interviews(): HasMany
    {
        return $this->hasMany(Interview::class, 'tutor_id');
    }


    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class, 'attendance');
    }

    public function isAdmin(): bool
    {
        return $this->email == 'samson2020odhiambo@gmail.com' || $this->email == 'tomsteve187@gmail.com';
    }

    public function isPremium(): bool
    {
        return $this->subscription_status == 'premium';
    }

    public function nextLesson(): ?Lesson
    {
        // Get the current user's attending lessons sorted by date in ascending order
        $attendingLessons = $this->lessons()->where('date', '>', now())->orderBy('date', 'asc')->get();

        // Return the first upcoming lesson, or null if there are no upcoming lessons
        return $attendingLessons->first();
    }

    public function registered_courses_count(): int
    {
        return $this->courses()->count();
    }

}
