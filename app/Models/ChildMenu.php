<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChildMenu extends Model
{
    use HasFactory;
    protected $table='childs_menu';

   
    public function menu(): BelongsTo{
        return $this->belongsTo(Menu::class);
    }
}
