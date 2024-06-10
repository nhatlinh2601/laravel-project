<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;
    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function correctAns()
    {
        return $this->hasOne(Answer::class);
    }

}
