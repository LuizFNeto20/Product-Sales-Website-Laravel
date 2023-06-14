<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    function list()
    {
        $order = Order::orderBy('id')->get();

        return view(
            'components/Listings/OrderList',
            compact('order')
        );
    }

    function save(Request $request)
    {
        $order = new Order();

        $order->status = 'in progress';
        $order->products = $request->input('order');
        $order->users_id = Auth()->user()->id;

        $order->save();

        return redirect()->route('cart.cancel');

    }

    function editStatus(Request $request)
    {
        $order = Order::find($request->input('id'));

        $order->status = $request->input('status');

        $order->save();

        return redirect()->route('order.list');
    }

    function edit($id)
    {
        $order = Order::find($id);
        $user = User::find($order->users_id);
        $products = Product::orderby('id')->get();

        return view("components/Forms/FormOrder", compact('order', 'user', 'products'));
    }
}