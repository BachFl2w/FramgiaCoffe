<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function add($product, $topping, $id)
    {
        $cart = [
            'qty' => 0,
            'price' => 0,
            'product' => $product,
            'topping' => $topping,
        ];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $cart = $this->items[$id];
            }
        }

        // qty
        $cart['qty']++;
        $this->totalQty++;

        // price
        $cart['price'] = $cart['qty'] * $product->price; // price foreach item
        $this->totalPrice += $price;

        // item
        $this->items[$id] = $cart;
    }

    // tru 1
    public function reduceByOne($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        if($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }
    }

    // xoa 1 sp
    public function removeItem($id)
    {
        $this->totalQty   -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];

        unset($this->items[$id]);
    }

    // xoa het sp trong gio hang
    public function removeAllItem()
    {
        session()->forget('cart');
    }
}
