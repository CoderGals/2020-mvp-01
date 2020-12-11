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
                    "photo" => $gift->pic_url,
                    'description' => $gift->description
                ]
            ];
            session()->put('cart', $cart);

            session()->flash('status', 'Gift was successfully added in the cart!');

            return back();
        }
        if (isset($cart[$gift->id])) {
            $cart[$gift->id]['quantity']++;
            session()->put('cart', $cart);

            session()->flash('status', 'Gift was successfully added in the cart!');

            return back();
        }
        $cart[$gift->id] = [
            "name" => $gift->name,
            "quantity" => 1,
            "price" => $gift->price,
            "photo" => $gift->pic_url,
            'description' => $gift->description
        ];
        session()->put('cart', $cart);

        session()->flash('status', 'Gift was successfully added in the cart!');

        return back();
    }

    public function lowerQuantity(Gift $gift)
    {
        $cart = session()->get('cart');
        if ($cart) {
            if (isset($cart[$gift->id])) {
                if ($cart[$gift->id]['quantity'] > 1) {
                    $cart[$gift->id]['quantity']--;
                } else {
                    unset($cart[$gift->id]);
                }
                session()->put('cart', $cart);
                session()->flash('status', 'One of this gift was removed from the card!');
                return back();
            }
            session()->flash('error', 'This gift is not on the card!');
            return back();
        }
        session()->flash('error', 'There are no gifts in the card!');
        return back();
    }

    public function remove(Gift $gift)
    {
        $cart = session()->get('cart');
        if ($cart) {
            if (isset($cart[$gift->id])) {
                unset($cart[$gift->id]);
                session()->put('cart', $cart);
                session()->flash('status', 'Gift was successfully removed from card!');
                return back();
            }
            session()->flash('error', 'This gift is not on the card!');
            return back();
        }
        session()->flash('error', 'There are no gifts in the card!');
        return back();
    }

    public function index()
    {
        $gifts = session()->get('cart');
        return view('cart', compact('gifts'));
    }

    public function resetCard()
    {
        session(['cart' => null]);
        
        return redirect()->route('home');
    }
}
