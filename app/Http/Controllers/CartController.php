<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Cart;
use App\User;
use App\OrderDetailToping;
use App\OrderDetail;
use App\Order;
use App\Topping;
use App\Product;

use Session;
use Hash;
use Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart') ? session::get('cart') : null;
        return view('cart', compact('cart'));
    }

    public function add(Request $req, Product $product, Topping $topping)
    {
        $oldCart = Session('cart') ? Session('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $topping, $product->id);
        $req->session()->put('cart', $cart);

        return redirect()->back();
    }

    // delete 1 product
    public function minus(Product $product)
    {
        $oldCart = Session('cart') ? Session('cart') : null;

        if ($oldCart) {
            $cart = new Cart($oldCart);
            $cart->reduceByOne($product->id);

            if (count($cart->items) == 0) {
                session::forget('cart');
            } else {
                session(['cart' => $cart]);
            }
        }

        return back();
    }

    public function deleteOne(Product $product)
    {
        // dd($product);

        $oldCart = Session('cart') ? Session('cart') : null;

        if ($oldCart) {
            $cart = new Cart($oldCart);
            $cart->removeItem($product);

            if (count($cart->items) == 0) {
                session::forget('cart');
            } else {
                session(['cart' => $cart]);
            }
        }

        return back();
    }

    public function destroy()
    {
        if (session('cart')) {
            $cart = new Cart(session('cart'));
            $cart->removeAllItem();
        }

        return back();
    }

    public function checkout(Request $req)
    {
        if ($req) {

        }
        $cart = session('cart');

        $id = null;
        if (Auth::id()) {
            $id = Auth::id();
        }

        $order = new Order;
        $order->receiver = $req->name;
        $order->user_id = $id;
        $order->order_place = $req->order_place;
        $order->order_phone = $req->order_phone;
        $order->status = 0;
        $order->note = $req->note;

        $order->save();

        foreach ($cart->items as $key => $value) {
            $orderDetail = new orderDetail;
            $orderDetail->product_id = $key;
            $orderDetail->order_id = $order->id;
            $orderDetail->quantity = $value['qty'];
            $orderDetail->save();

            $orderDetailTopping = new OrderDetailToping;
            // $orderDetailTopping = ;
        }

        session()->forget('cart');

        return back()->with('success', __('message.success.order'));
    }

    public function demo(Request $request)
    {
        $cart = new Cart();

        $cart->add($request->product_id, $request->product_price, $request->topping);
    }

}