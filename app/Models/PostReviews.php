<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostReviews extends Model
{
    use HasFactory;
    protected $table='post_reviews';

    public function post(): BelongsTo{
        return $this->belongsTo(Post::class);
    }
    public function student(): BelongsTo{
        return $this->belongsTo(Student::class);
    }
}
