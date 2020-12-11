<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryCelebration extends Model 
{

    protected $table = 'category_celebration';
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function celebration()
    {
        return $this->belongsTo(Celebration::class);
    }

}