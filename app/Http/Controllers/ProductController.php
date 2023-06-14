<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Supplier;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function list()
    {
        $products = Product::orderBy('id')->get();

        return view(
            'components/Listings/ProductList',
            compact('products')
        );
    }

    function new()
    {
        $product = new Product();
        $product->id = $product->max('id') + 1;
        $product->name = "";
        $product->price = "";

        $categories = Category::orderBy('id')->get();
        $suppliers = Supplier::orderBy('id')->get();

        return view("components/Forms/FormProduct", compact('product', 'categories', 'suppliers'));
    }

    function save(Request $request)
    {
        if ($request->input('id') == Product::max('id') + 1) {
            $product = new Product();
        } else {
            $product = Product::find($request->input('id'));
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $savedImage = $image->store('public/ImagensProdutos');
            $savedImage = explode("/", $savedImage);
            $size = count($savedImage);
            if ($product->image != "") {
                Storage::delete("public/ImagensProdutos/$product->image");
            }
            $product->image = $savedImage[$size - 1];
        }

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->supplier_id = $request->input('supplier_id');

        $product->save();

        return redirect('product/list');
    }

    function edit($id)
    {
        $product = Product::find($id);

        $categories = Category::orderBy('id')->get();
        $suppliers = Supplier::orderBy('id')->get();

        return view("components/Forms/FormProduct", compact('product', 'categories', 'suppliers'));
    }

    function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('product/list');
    }

    function info($id)
    {
        $product = Product::find($id);
        $users = User::orderBy('id')->get();
        $categories = Category::orderBy('id')->get();
        $suppliers = Supplier::orderBy('id')->get();
        $reviews = Review::orderBy('id')->get();

        $idReview = isset($_GET['review_id']) ? $_GET['review_id'] : null;

        if (!empty($idReview)) {
            $id_Review = Review::find($idReview);
            return view("components/Listings/InfoProduct", 
            compact('product', 'users', 'categories', 'suppliers', 'reviews', 'id_Review'));
        } else {
            return view("components/Listings/InfoProduct", 
            compact('product', 'users', 'categories', 'suppliers', 'reviews'));
        }
    }
}