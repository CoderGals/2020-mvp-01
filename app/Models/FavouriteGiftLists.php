<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavouriteGiftLists extends Model 
{

    protected $table = 'favourite_gift_lists';
    public $timestamps = true;
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(FavouriteGiftListItem::class, 'favourite_gift_list_id');
    }

}