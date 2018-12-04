<?php

namespace App;

use Illuminate\Support\Facades\Session;

class Cart1
{
    private $cart = [];

    public function __construct()
    {
        $this->cart = Session::get('cart', []);
    }

    public function addProduct($product, $toppings, $size)
    {
        $toppings_id_array = '';
        $topping_current = [];
        $toppings_price = 0;
        if ($toppings) {
            foreach ($toppings as $value) {
                $topping = $value;
                $topping->price_current = $value->price;
                $topping_current[] = $topping;
                $toppings_price += $value->price;
                $toppings_id_array .= $value->id;
            }
        }
        $key = implode('-', [$product->id, $size->id, $toppings_id_array]);
        $item_new = [
            'product' => $product,
            'quantity' => 1,
            'toppings' => $topping_current,
            'size' => $size,
            'product_price' => $product->price,
            'product_discount' => $product->discount,
        ];
        $item_new_price = $product->price * (1 + $size->percent) * (1 - $product->discount) + $toppings_price;
        if (empty($this->cart)) {
            $this->cart[] = [
                'key' => $key,
                'item' => $item_new,
                'item_price' => $item_new_price,
            ];
        } else {
            $flat = false;
            $index = 0;
            for ($i = 0; $i < count($this->cart); $i++) {
                if ($this->cart[$i]['key'] == $key) {
                    $flat = true;
                    $index = $i;
                    break;
                }
            }
            if ($flat) {
                $this->cart[$index]['item']['quantity'] += 1;
            } else {
                $this->cart[] = [
                    'key' => $key,
                    'item' => $item_new,
                    'item_price' => $item_new_price,
                ];
            }
        }
        Session::put('cart', $this->cart);
    }

    public function reduceQuantity($keyCart)
    {
        for ($i = 0; $i < count($this->cart); $i++) {
            if ($this->cart[$i]['key'] == $keyCart) {
                $this->cart[$i]['item']['quantity'] -= 1;
                $this->cart[$i]['item']['item_price'] = $this->cart[$i]['item_price']
                    - $this->cart[$i]['item']['product_price']
                    * (1 + $this->cart[$i]['item']['size']->percent)
                    * (1 - $this->cart[$i]['item']['product_discount']);
                break;
            }
        }
        Session::put('cart', $this->cart);
    }

    public function increaseQuantity($keyCart)
    {
        for ($i = 0; $i < count($this->cart); $i++) {
            if ($this->cart[$i]['key'] == $keyCart) {
                $this->cart[$i]['item']['quantity'] += 1;
                $this->cart[$i]['item']['item_price'] = $this->cart[$i]['item_price']
                    + $this->cart[$i]['item']['product_price']
                    * (1 + $this->cart[$i]['item']['size']->percent)
                    * (1 - $this->cart[$i]['item']['product_discount']);
                break;
            }
        }
        Session::put('cart', $this->cart);
    }

    public function removeItem($keyCart)
    {
        for ($i = 0; $i < count($this->cart); $i++) {
            if ($this->cart[$i]['key'] === $keyCart) {
                unset($this->cart[$i]);
                break;
            }
        }
        $data = [];
        foreach ($this->cart as $cart) {
           $data[] = $cart;
        }
        
        Session::put('cart', $data);
    }

    public function removeAll()
    {
        Session::put('cart', []);
    }
}
