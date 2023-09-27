<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lesson extends Model
{
    use HasFactory;

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


    function getSvgAttribute(): string
    {
        //get the course image that is associated with this lesson
        return '/images/1695652763.svg';
    }

    public function getImageAttribute(): string
    {
        $randomImages = [
            'https://img.freepik.com/free-vector/web-development-programmer-engineering-coding-website-augmented-reality-interface-screens-developer-project-engineer-programming-software-application-design-cartoon-illustration_107791-3863.jpg?w=996&t=st=1695650677~exp=1695651277~hmac=d554a74b40267beed9e2835c04aacbf61950baa711e034c4c3f6777ff94b7c8d',
            'https://img.freepik.com/free-vector/programming-concept-illustration_114360-1351.jpg?w=740&t=st=1695650824~exp=1695651424~hmac=fd8c07236157a079cff705fe97f84bb49528bc4321483f72ca3635f4b7cf2f8a',
            'https://img.freepik.com/free-photo/programming-background-with-person-working-with-codes-computer_23-2150010125.jpg?w=996&t=st=1695650859~exp=1695651459~hmac=1c34ef9f09f4689b00a44fe41e754fa7a8f4cee893c1a4cab8ed031dcbc38455',
            'https://img.freepik.com/free-photo/programming-background-with-person-working-with-codes-computer_23-2150010142.jpg?w=996&t=st=1695650899~exp=1695651499~hmac=c4f2155ab349e02b32329f58a8de83cb8f70b1d11438f735bb01d8d0288e4cd5',
            'https://img.freepik.com/free-vector/laptop-with-program-code-isometric-icon-software-development-programming-applications-dark-neon_39422-971.jpg?w=826&t=st=1695650924~exp=1695651524~hmac=d9b7c839556fc344965ee14c4b0c284b5a5286d7584e2fae8782ee2ae89d62c3',
            'https://img.freepik.com/free-vector/desktop-smartphone-app-development_23-2148683810.jpg?w=740&t=st=1695650956~exp=1695651556~hmac=4bdd10ac7358573205a39b938bfb4930840720f01d62ccc04a02efc4224f6a13',
            'https://img.freepik.com/free-vector/programmer-concept-illustration_114360-2417.jpg?w=740&t=st=1695651006~exp=1695651606~hmac=d2515bb6457a81ce1f50701e2c2e32f22eb4382c97eb5c301a3896729189c87f'
        ];

        return $randomImages[array_rand($randomImages)];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }


    public function students(): BelongsToMany
    {
        //return from attendances table where lesson_id = this lesson id
        return $this->belongsToMany(User::class, 'attendance', 'lesson_id', 'user_id');
    }


}
