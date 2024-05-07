<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LessonReviews extends Model
{
    use HasFactory;
    protected $table='lesson_reviews';

    public function lesson(): BelongsTo{
        return $this->belongsTo(Lesson::class);
    }
    public function student(): BelongsTo{
        return $this->belongsTo(Student::class);
    }
}
