<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menus extends Model
{
    use HasFactory;
    public $table = 'menus';

    public function childs(): HasMany{
        return $this->hasMany(ChildMenu::class);
    }
}
