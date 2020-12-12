<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CelebrationController extends Controller
{
    public function __invoke(Category $category)
    {
        return $category->celebrations;
    }
}
