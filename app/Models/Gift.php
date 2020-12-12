<?php

namespace App\Models;

use App\Models\Traits\HasUniqueNumber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gift extends Model 
{

    protected $table = 'gifts';
    public $timestamps = true;

    use SoftDeletes;
    use HasUniqueNumber;
    use HasFactory;
    protected $dates = ['deleted_at'];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'gift_category');
    }
    public function celebrations()
    {
        return $this->belongsToMany(Celebration::class, 'gift_celebration');
    }
}