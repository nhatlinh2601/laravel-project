<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table='orders_detail';

    public function order(): BelongsTo{
        return $this->belongsTo(Order::class);
    }

   public function course(): HasOne{
    return $this->hasOne(Course::class);
   }
}
