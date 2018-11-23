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
            'topping' => [$topping->id => $topping],
        ];

        if ($this->items) {

            if (array_key_exists($product->id, $this->items)) {
                $cart = $this->items[$product->id];

                if (!array_key_exists($topping->id, $cart['topping'])) {
                    $cart['topping'][$topping->id] = $topping;
                }
            }
        }

        $toppingPrice = 0;
        foreach ($cart['topping'] as $value) {
            $toppingPrice = $cart['topping'] + $topping->price;
        }

        // qty
        $cart['qty']++;
        $this->totalQty++;

        // price
        $cart['price'] = $cart['qty'] * $product->price + $toppingPrice; // price foreach item
        $this->totalPrice += $cart['price'];

        // item
        $this->items[$product->id] = $cart;
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


//////////////////////////

    public $carts = [];

    function __construct()
    {
        $old_cart = Session::get('cart');

        if ($old_cart != null) {
            $this->carts = $old_cart;
        } else {
            Session::put('cart', $this->carts);
        }
    }

    function add($productId, $productPrice, $topping)
    {
        $cart_new = null;

        if (count($this->carts) == 0) {
            $cart_new = [
                'id' => 1,
                'product_id' => $productId,
                'price' => $productPrice,
                'quantity' => 1,
                'id_toppings' => $topping,
            ];
            $this->carts[] = $cart_new;
        } else {

            foreach ($this->carts as $cart) {

                if (count($cart['id_toppings']) > count($topping)) {
                    $result = array_diff($topping, $cart['id_toppings']);
                }
                
                if (count($cart['id_toppings']) < count($topping)) {
                    $result = array_diff($cart['id_toppings'], $topping);
                }
                else {
                    $result = array_merge(
                        array_diff($topping, $cart['id_toppings']),
                        array_diff($cart['id_toppings'], $topping)
                    );
                }

                if ($cart['product_id'] != $productId || count($result) != 0) {

                    $cart_new['id'] = $cart['id'] + 1;

                    $cart_new['product_id'] = $productId;

                    $cart_new['id_toppings'] = $topping;

                    $cart_new['price'] = $productPrice;

                    $cart_new['quantity'] = 1;

                } else {
                    $cart['quantity']++;
                }

                if($cart_new != null)
                {
                    $this->carts[] = $cart_new;
                }
            }
        }

        Session::put('cart', $this->carts);
    }
}
