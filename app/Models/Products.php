<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    
    public function categories()
    {
        return $this->belongsToMany(Categories::class);
    }
    
    
    public function galleries()
    {
        return $this->hasMany(Images::class);
    }
}
