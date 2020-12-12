<?php

namespace App\Http\Controllers;

use App\Models\FavouriteGiftLists;
use Illuminate\Http\Request;

class FavouriteGiftListController extends Controller
{
    public function index()
    {
        $lists = auth()->user()->lists;

        return view('list', compact('lists'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['max:255', 'min:5', 'unique:favourite_gift_lists,name']
        ]);

        auth()->user()->lists()->create($request->all());

        session()->flash('status', 'Successfully created!');
        return back();
    }

    public function show(FavouriteGiftLists $list) {

       // dd($list->('items'));
        $list = $list->load('items');
        return view('show', compact('list'));
    }
}
