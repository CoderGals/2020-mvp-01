<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavouriteGiftLists extends Model 
{

    protected $table = 'favourite_gift_lists';
    public $timestamps = true;

    public function items()
    {
        return $this->hasMany(FavouriteGiftListItem::class);
    }

}