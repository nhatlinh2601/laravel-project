<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    public function video(): BelongsTo{
        return $this->belongsTo(Lesson::class);
    }

    public function student(): BelongsTo{
        return $this->belongsTo(Student::class);
    }
    public function replyComments()
    {
        return $this->hasMany(ReplyComment::class);
    }
}
