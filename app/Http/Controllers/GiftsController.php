<?php

namespace App\Http\Controllers;

use App\Models\FavouriteGiftListItem;
use App\Models\FavouriteGiftLists;
use App\Models\Gift;
use Illuminate\Http\Request;

class GiftsController extends Controller
{
    public function index(Gift $gift)
    {

        $lists = auth()->user()->lists;

        return view('add_to_list', compact('gift', 'lists'));
    }


    public function store(Gift $gift, Request $request)
    {
        $list = FavouriteGiftLists::where('id', $request->list_id)->first();
        if (!$list || $list->user_id != auth()->user()->id) {
            abort(401);
        }

        $list->items()->create([
            'gift_id' => $gift->id
        ]);

        session()->flash('status', 'Successfully add gift to favourites list!');

        return redirect()->route('home');
    }

    public function remove(FavouriteGiftListItem $item)
    {

        $item->delete();

        session()->flash('status', 'Successfully removed gift from list!');
        return back();
    }
}
