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

class Teacher extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'teachers';

  
    protected $fillable = [
        'id',
        'name',
        'description',
        'exp',
        'image_path',
        'slug'
    ];

   
    public static function getTeachersAtHome(){
        return self::take(4)->get();
    }

    public static function getAllTeacherPag($perPage){
        return DB::table('teachers')->paginate($perPage);
    }

    public static function getCourseByTeacher($id_teacher){
        $coursesByTeachers = DB::table('teachers')
        ->join('courses', 'courses.teacher_id', '=', 'teachers.id')
        ->select('courses.*', 'teachers.name AS teacher_name', 'teachers.description AS teacher_des', 'teachers.image_path AS teacher_img')
        ->where('teacher_id', '=', $id_teacher)
        ->get();

        return $coursesByTeachers;
    }

    public static function getTeacherByTeacherId($id_teacher){
        $teacher = DB::table('teachers')
            ->where('id','=',$id_teacher)
            ->first();

        return $teacher;
    }
    public function courses(): HasMany{
        return $this->hasMany(Course::class);
    }
    public function user(): BelongsTo{
        return $this->BelongsTo(User::class);
    }
    public function reviews(): HasMany
    {
        return $this->hasMany(TeacherReviews::class);
    }
}
