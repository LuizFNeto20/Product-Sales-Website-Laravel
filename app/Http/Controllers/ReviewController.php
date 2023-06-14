<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    function save(Request $request)
    {

        $productID = $request->input('product_id');

        if ($request->input('id') == Review::max('id') + 1) {
            $review = new Review();
        } else {
            $review = Review::find($request->input('id'));
        }

        $review->assessment = $request->input('assessment');
        $review->description = $request->input('description');
        $review->user_id = $request->input('user_id');
        $review->product_id = $request->input('product_id');

        $review->save();

        return redirect('product/info/' . $productID);
    }

    function edit($id)
    {
        $review = Review::find($id);

        return view("components/Forms/FormProduct", compact('product', 'categories', 'suppliers'));
    }

    function delete($id)
    {
        $review = Review::find($id);
        $review->delete();

        return redirect()->route('home');
    }
}
