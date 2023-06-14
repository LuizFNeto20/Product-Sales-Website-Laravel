<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function list()
    {
        $products = Product::orderBy('id')->get();
        $reviews = Review::orderBy('id')->get();

        return view(
            'Index',
            compact('products', "reviews")
        );
    }
}
