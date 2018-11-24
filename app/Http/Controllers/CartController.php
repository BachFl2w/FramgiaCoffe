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
        $oldCart = Session::get('cart');
        if ($oldCart) {
            $cart = new Cart($oldCart);
            $data = [
                'cart' => $cart->items,
                'totalPrice' => $cart->totalPrice,
                'totalQty' => $cart->totalQty
            ];

            return view('cart', compact('data'));
        }

        return view('cart');
    }

    public function demo(Request $request)
    {
        $cart = new Cart();

        $cart->add($request->product_id, $request->product_price, $request->topping);
    }

    public function add(Request $req)
    {
        $product = Product::findOrFail($req->product);
        $topping = Topping::findOrFail($req->topping);

        $oldCart = Session('cart') ? Session('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $topping);
        $req->session()->put('cart', $cart);

        return redirect(route('user.cart.index'));
    }

    public function plus($cartId)
    {
        $oldCart = Session('cart') ? Session('cart') : null;
        $cart = new Cart($oldCart);
        $cart->plus($cartId);

        session()->put('cart', $cart);

        return redirect(route('user.cart.index'));
    }

    // delete 1 product
    public function minus($cartId)
    {
        $oldCart = Session('cart') ? Session('cart') : null;

        if ($oldCart) {
            $cart = new Cart($oldCart);
            $cart->minus($cartId);

            if (count($cart->items) == 0) {
                session::forget('cart');
            } else {
                session(['cart' => $cart]);
            }
        }

        return back();
    }

    public function deleteOne($cartId)
    {
        $oldCart = Session('cart') ? Session('cart') : null;

        if ($oldCart) {
            $cart = new Cart($oldCart);
            $cart->removeItem($cartId);

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
        if (Session('cart')) {
            session()->forget('cart');
        }

        return back(route('user.cart.index'));
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
}
