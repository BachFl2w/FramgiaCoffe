<?php

namespace App\Http\Controllers;

use Session;
use Hash;
use Auth;

use App\Cart;
use App\User;
use App\OrderDetailToping;
use App\OrderDetail;
use App\Order;
use App\Size;
use App\Topping;
use App\Product;
use App\Repositories\Repository;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;

class CartController extends Controller
{
    protected $orderModel;
    protected $orderDetailModel;

    function __construct(Order $orderModel, OrderDetail $orderDetailModel) {
        $this->orderModel = new Repository($orderModel);
        $this->orderDetailModel = new Repository($orderDetailModel);
    }

    public function index()
    {
        if (Session::has('cart')) {
            $oldCart = Session('cart');
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

    public function add(Request $req)
    {
        $product = Product::findOrFail($req->product);
        $size = Size::findOrFail($req->size);

        if ($req->topping) {
            $topping = Topping::findOrFail($req->topping);
        } else {
            $topping = null;
        }

        $oldCart = Session('cart') ? Session('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $topping, $size);
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

        return back();
    }

    public function checkout(OrderRequest $req)
    {
        $cart = session('cart');

        $id = null;
        if (Auth::id()) {
            $id = Auth::id();
        }

        // dd($cart);

        $order = $this->orderModel->create([
            'receiver' => $req->name,
            'user_id' => $id,
            'order_place' => $req->order_place,
            'order_phone' => $req->order_phone,
            'status' => 0,
            'note' => $req->note,
        ]);

        // dd($order->id);

        foreach ($cart->items as $key => $value) {
            $orderDetail = $this->orderDetailModel->create([
                'product_id' => $cart->items[$key]['product']->id,
                'product_price' => $cart->items[$key]['product']->price,
                'order_id' => $order->id,
                'size_id' => $cart->items[$key]['size']->id,
                'quantity' => $cart->items[$key]['qty'],
            ]);

            /**
             * Sửa code ở 2 model orderDetail và Topping thêm ->withPivot('topping_price');
             Trong đó tham số truyền vào của withPivot là các gía trị muốn thêm mà ko liên qua đến liên kết gĩưa 3 bảng, ví dụ ở đây là price của topping
             **/
            if ($value['topping']) {
                foreach ($value['topping'] as $k => $v) {
                    // $orderDetail->toppings()->atach([
                    //     'topping_id' => $v->id, (Ko cần khai báo key cho nó vì nó là cột liên kết rồi)
                    //     'topping_price' => $v->price, (Muốn thêm gía trị của cột ko liên qua thì dùng mảng truyền vào theo kiểu key => value)
                    //     'order_detail_id' => $orderDetail->id, (đoạn này bị thưa, vì khi dùng $orderDetail->toppings() là đã có 1 id của $orderDetail thêm vào rồi, ko cần cái này)
                    // ]);
                    $orderDetail->toppings()->attach(
                        $v->id,
                        [
                            'topping_price' => $v->price,
                        ]
                    );
                }
            }
        }

        session()->forget('cart');

        return back()->with('success', __('message.success.order'));
    }
}
