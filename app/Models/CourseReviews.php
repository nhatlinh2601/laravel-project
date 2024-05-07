<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseReviews extends Model
{
    use HasFactory;
    protected $table='course_reviews';

    public function course(): BelongsTo{
        return $this->belongsTo(Course::class);
    }
    public function student(): BelongsTo{
        return $this->belongsTo(Student::class);
    }
}
