<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function addToCart($id) {
        $user = Auth()->user()->id;
    
        $cart = Cart::where('users_id', $user)->where('product_id', $id)->first();
    
        if ($cart) {
            $cart->quantity += 1;
        } else {
            $cart = new Cart();
            $cart->quantity = 1;
            $cart->users_id = $user;
            $cart->product_id = $id;
        }
    
        $cart->save();
    
        return redirect()->route('cart.list');
    }

    function list(){
        $products = Product::orderBy('id')->get();
        
        $productsCart = Cart::where('users_id', Auth()->user()->id)->get();

        return view('components/Listings/Cart', compact('productsCart', 'products'));
    }

    function cancel(){
        $user = Auth()->user()->id;
    
        Cart::where('users_id', $user)->delete();

        return redirect()->route('home');
    }

    function delete($productId){
        $userId = Auth()->user()->id;
    
        Cart::where('product_id', $productId)->where('users_id', $userId)->delete();
    
        return redirect()->route('cart.list');
    }
}
