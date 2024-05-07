<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeacherReviews extends Model
{
    use HasFactory;
    protected $table='teacher_reviews';

    public function teacher(): BelongsTo{
        return $this->belongsTo(Teacher::class);
    }
    public function student(): BelongsTo{
        return $this->belongsTo(Student::class);
    }
}
