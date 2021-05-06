<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function superCategories()
    {
        return $this->hasMany(SuperCategory::class);
    }
}
