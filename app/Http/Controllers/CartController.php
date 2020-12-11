<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __invoke(Gift $gift)
    {
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $gift->id => [
                    "name" => $gift->name,
                    "quantity" => 1,
                    "price" => $gift->price,
                    "photo" => $gift->pic_url
                ]
            ];
            session()->put('cart', $cart);

            session()->flash('status', 'Gift was successfully added in the cart!');

            return redirect()->route('home');
        }
        if (isset($cart[$gift->id])) {
            $cart[$gift->id]['quantity']++;
            session()->put('cart', $cart);

            session()->flash('status', 'Gift was successfully added in the cart!');

            return redirect()->route('home');
        }
        $cart[$gift->id] = [
            "name" => $gift->name,
            "quantity" => 1,
            "price" => $gift->price,
            "photo" => $gift->pic_url
        ];
        session()->put('cart', $cart);

        session()->flash('status', 'Gift was successfully added in the cart!');

        return redirect()->route('home');
    }
}
