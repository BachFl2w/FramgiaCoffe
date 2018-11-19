<?php

namespace App\Http\Controllers;

use App\Image;
use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $data = [];
        $popular_products = DB::table('order_details')
            ->join('products', 'product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->groupBy('product_id', 'categories.name')
            ->limit(6)
            ->get(['products.*', 'categories.name as category']);
        $id = [];
        foreach ($popular_products as $product) {
            $id[] = $product->id;
        }
        $data = $popular_products;
        if (count($data) < 6) {
            $quantity = count($data);
            $products = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->whereNotIn('products.id', $id)
                ->take(6 - $quantity)
                ->get(['products.*', 'categories.name as category']);
            foreach ($products as $product) {
                $data[] = $product;
            }
        }
        $index = 0;
        foreach ($data as $product) {
            $image = Image::where('product_id', $product->id)->orderBy('active', 'id')->first();

            $data[$index]->image = $image;

            $index++;
        }
        return view('index', compact('data'));
    }

    public function listProduct() {
        
        return view('list_product');
    }
}
