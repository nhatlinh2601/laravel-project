<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'students';

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'image_path',
        'slug'
    ];
    public function lessonReviews(): HasMany
    {
        return $this->hasMany(LessonReviews::class);
    }
    public function courseReviews(): HasMany
    {
        return $this->hasMany(CourseReviews::class);
    }
    public function teacherReviews(): HasMany
    {
        return $this->hasMany(TeacherReviews::class);
    }
    public function postReviews(): HasMany
    {
        return $this->hasMany(PostReviews::class);
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'courses_students', 'student_id', 'course_id');
    }


   
}
