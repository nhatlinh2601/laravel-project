<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Lesson extends Model
{
    use HasFactory;
    protected $table = 'lessons';


    public static function getLessonByCourse($id_course){
        $result = Lesson::with('course')
            ->join('courses', 'courses.id', '=', 'lessons.course_id')
            ->select('lessons.*', 'courses.name as course_name')
            ->where('lessons.course_id',$id_course )
            ->get();

        // Hiển thị kết quả
       return $result;
    }

    public static function getLessonById($id){
        $result = DB::table('lessons')
        ->join('courses', 'courses.id', '=', 'lessons.course_id')
        ->select('lessons.*', 'courses.name as course_name')
        ->where('lessons.id', '=', $id)
        ->first();
    
        return $result;
    }


    
    public function course(): BelongsTo{
        return $this->belongsTo(Course::class);
    }

    public function videos(): HasMany{
        return $this->hasMany(Video::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(LessonReviews::class);
    }
}
