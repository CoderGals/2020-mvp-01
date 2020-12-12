<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavouriteGiftListItem extends Model 
{

    protected $table = 'favourite_gift_list_items';
    public $timestamps = true;

    protected $guarded = [];

    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }

    public function list()
    {
        return $this->belongsTo(FavouriteGiftLists::class);
    }

}