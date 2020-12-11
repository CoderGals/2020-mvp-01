<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftCategory extends Model 
{

    protected $table = 'gift_category';
    public $timestamps = true;

    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}