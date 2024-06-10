<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ReplyComment extends Model
{
    use HasFactory;
    protected $table='reply_comments';
    public function comment(): BelongsTo{
        return $this->belongsTo(Comment::class);
    }
    public function student(): BelongsTo{
        return $this->belongsTo(Student::class);
    }
    
}
