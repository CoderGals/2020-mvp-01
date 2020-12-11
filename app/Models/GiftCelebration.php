<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftCelebration extends Model 
{

    protected $table = 'gift_celebration';
    public $timestamps = true;

    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }

    public function celebartion()
    {
        return $this->belongsTo(Celebration::class);
    }

}