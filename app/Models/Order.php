<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function student(): BelongsTo{
        return $this->belongsTo(Student::class);
    }
    public function details(): HasMany{
        return $this->hasMany(OrderDetail::class);
    }

    public function getCart($student_id){
        $courses = DB::table('orders')
        ->join('orders_detail', 'orders.id', '=', 'orders_detail.order_id')
        ->select('courses.*')
        ->get();
    }
}
