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

use Session;
use Hash;

class PageController extends Controller
{
    public function index()
    {
        $cart = session('cart') ? session('cart') : null;
        return view('', compact('cart'));
    }

    public function add(Request $req, Product $product)
    {
        $topping = null;

        if (!empty($req->topping)) {
            // duyet ra id cua cac topping
            foreach ($req->topping as $value) {
                $topping = [$value];
            }
        }

        $oldCart = Session('cart') ? Session('cart') : null ;
        $cart = new Cart($oldCart);
        $cart->add($product, $topping, $product->id);
        $req->session()->put('cart', $cart);

        return redirect()->back();
    }

    // delete 1 product
    public function deleteOne(Product $product)
    {
        $oldCart = Session('cart') ? Session::get('cart') : null ;

        if ($oldCart) {
            $cart = new Cart($oldCart);
            $cart->removeItem($product->id);

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
            $orderDetailTopping = ;
        }

        session()->forget('cart');

        return back()->with('success', __('message.success.order'));
    }
}
