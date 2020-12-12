<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model 
{

    use HasFactory;
    protected $table = 'categories';
    public $timestamps = true;

    protected $guarded = [];

    public function celebrations()
    {
        return $this->belongsToMany(Celebration::class, 'category_celebration');
    }
}