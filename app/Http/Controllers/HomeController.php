<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gift;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $gifts = Gift::paginate(10);
        $categories = Category::all();

        return view('home', compact('gifts', 'categories'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $gifts = Gift::whereNull('deleted_at');
            if ($request->search) {
                $gifts = $gifts->where('name', 'LIKE', "%{$request->search}%")
                    ->orWhere('description', 'LIKE', "%{$request->search}%");
            }
            if ($request->category && strlen($request->category)) {
                $gifts = $gifts->whereHas('categories', function ($query) use ($request) {
                    $query->where('category_id', $request->category);
                });
            }

            if ($request->category && strlen($request->celebration)) {
                $gifts = $gifts->whereHas('celebrations', function ($query) use ($request) {
                    $query->where('celebration_id', $request->celebration);
                });
            }

            $gifts = $gifts->paginate(10);
            foreach ($gifts as $gift) {
                $output = $output . '<div class="col-md-2 mt-2 gift-box"><div class=""><div class="gift-box-body  wow fadeIn">' .
                    '<img style="height:200px;object-fit:cover;width:100%" src="' .  $gift->pic_url . '" />' .
                    '<div class="gift-box-header mt-4 d-flex justify-content-between">' .
                    '<div class="name">' . $gift->name . '</div>' .
                    '<a href="' . route('add.favourites', $gift) . '"> <i class="fa fa-star" style="color:green"></i> </a></div></div>' .
                    '<p>' . $gift->description . '</p>' .
                    '<div class="gift-box-footer">' .
                    '<span class="d-block" style="float:left">' . $gift->price . ' $</span>' .
                    ((isset(session()->get('cart')[$gift->id])) ?
                        '<span class="d-block" style="float:right">x ' . session()->get('cart')[$gift->id]['quantity'] . ' on cart</span><br />' .
                        '<div class="d-flex justify-content-between mt-3"><div class="d-flex justify-content-start">' .
                        '<a href="' . route('add.cart', $gift) . '" class="btn btn-outline-success pull-right" style="float:right;padding: 14px;"><i class="fa fa-plus"></i></a>' .
                        '<a href="' . route('lower.quantity.cart', $gift) . '" class="btn btn-outline-primary pull-right ml-1" style="padding: 14px;"><i class="fa fa-minus"></i></a>' .
                        '</div>' .
                        '<a href="' . route('remove.cart', $gift) . '" class="btn btn-outline-danger pull-right" style="float:right;padding: 14px;"><i class="fa fa-trash"></i></a>' .
                        '</div>'
                        :
                        '<div>' .
                        '<a href="' . route('add.cart', $gift) . '" class="btn btn-outline-success pull-right" style="float:right;padding: 14px;">Add to cart</a></div>') .
                    '</div></div></div>';
            }
            return response($output);
        }
    }
}
