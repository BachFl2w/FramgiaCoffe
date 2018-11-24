<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($product, $topping, $size)
    {
        $cart = [
            'qty' => 0,
            'price' => 0,
            'size' => $size,
            'product' => $product,
            'topping' => $topping,
        ];

        // set key theo mã sản phẩm + mảng các key topping
        // VD: product 1, topping 1 +2 => key = 112
        $key = $product->id . implode($topping->pluck('id')->toArray());

        if ($this->items) {
            // kiểm tra nếu tồn tại cốc có cùng topping thì gán cart cho cart cũ
            if (array_key_exists($key, $this->items)) {
                $cart = $this->items[$key];
            }
        }

        $cart['qty']++;
        $this->totalQty++;

        // tổng tiền topping trong 1 cốc
        $totalToppingPrice = array_sum($topping->pluck('price')->toArray());
        $sizePrice = $product->price * $cart['size']->percent / 100;
        $productPrice = $product->price;
        $price = $productPrice + $sizePrice + $totalToppingPrice;

        $cart['price'] = $price * $cart['qty'];
        $this->totalPrice += $price;
        // dd($this->totalPrice, $cart['price']);

        // item
        $this->items[$key] = $cart;
    }

    public function plus($cartId)
    {
        if (isset($this->items[$cartId])) {
            $cart = $this->items[$cartId];

            $cart['qty']++;
            $this->totalQty++;

            $totalToppingPrice = array_sum($cart['topping']->pluck('price')->toArray());
            $sizePrice = $cart['product']->price * $cart['size']->percent / 100;
            $productPrice = $cart['product']->price;
            $price = $productPrice + $sizePrice + $totalToppingPrice;

            $cart['price'] = $price * $cart['qty'];
            $this->totalPrice += $price;

            // item
            $this->items[$cartId] = $cart;
        } else {
            return back()->with('fail', __('message.fail.find'));
        }
    }

    // tru 1
    public function minus($cartId)
    {
        if (isset($this->items[$cartId])) {
            $this->items[$cartId]['qty']--;
            $this->items[$cartId]['price'] -= $this->items[$cartId]['product']['price'];
            $this->totalQty--;
            $this->totalPrice -= $this->items[$cartId]['price'];

            if($this->items[$cartId]['qty'] <= 0){
                unset($this->items[$cartId]);
            }
        }
    }

    // xoa 1 sp
    public function removeItem($cartId)
    {
        if (isset($this->items[$cartId])) {
            $this->totalQty -= $this->items[$cartId]['qty'];
            $this->totalPrice -= $this->items[$cartId]['price'];

            unset($this->items[$cartId]);
        }
    }
}
