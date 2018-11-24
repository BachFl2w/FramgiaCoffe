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

    public function add($product, $topping)
    {
        $cart = [
            'qty' => 0,
            'price' => 0,
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
        $cart['price'] = $product->price * $cart['qty'] + $totalToppingPrice;
        $this->totalPrice += $cart['price'];

        // item
        $this->items[$key] = $cart;
    }

    // tru 1
    public function reduceByOne(Product $product)
    {
        $this->items[$product->id]['qty']--;
        $this->items[$product->id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$product->id]['item']['price'];

        if($this->items[$product->id]['qty'] <= 0){
            unset($this->items[$id]);
        }
    }

    // xoa 1 sp
    public function removeItem($product)
    {
        if (isset($this->items[$product->id])) {
            $this->totalQty -= $this->items[$product->id]['qty'];
            $this->totalPrice -= $this->items[$product->id]['price'];

            unset($this->items[$product->id]);
        }
    }

    // xoa het sp trong gio hang
    public function removeAllItem()
    {
        session()->forget('cart');
    }
}
