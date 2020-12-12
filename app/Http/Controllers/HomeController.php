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

            $gifts = $gifts->paginate(10);
            foreach ($gifts as $gift) {
                $output = $output . '<div class="col-md-3 mt-2">' .
                    '<div class="card">' .
                    '<div class="card-header">' . $gift->name . '</div>' .
                    '<div class="card-body">' .
                    '<img class="w-100 h-auto" src="' . $gift->pic_url . '" />' .
                    '<p>' . $gift->description . '</p>' .
                    '</div>' .
                    '<div class="card-footer"><a class="btn btn-light pull-right" style="float:right">Add to cart</a></div>' .
                    '</div>' .
                    '</div>';
            }
            return response($output);
        }
    }
}
