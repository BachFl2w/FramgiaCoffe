<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Image;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\Category;
use App\Topping;
use App\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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

    public function listProduct()
    {
        $products = Product::with(['images' => function ($query) {
            $query->orderBy('active', 'id')->get();
        }])->with(['category' => function ($query) {
            $query->get();
        }])->paginate(4);

        return view('list_product', compact('products'));
    }

    public function liveSearch(Request $request)
    {
        $keyword = $request->keyword;
        $data = [];
        if ($keyword != null) {
            $data = Product::where('name', 'like', '%' . $keyword . '%')
                ->with(['images' => function ($query) {
                    $query->orderBy('active', 'id')->get();
                }])
                ->limit(4)->get();
        }

        return $data;
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $products = [];
        if ($keyword != null) {
            $products = Product::where('name', 'like', '%' . $keyword . '%')
                ->with(['images' => function ($query) {
                    $query->orderBy('active', 'id')->get();
                }])
                ->paginate(5);
        }

        return view('list_result_search', compact('products'));
    }

    public function filterProductByCategory(Request $request)
    {
        $category_id = $request->category_id;

        $products = [];

        if ($category_id == 0) {
            $products = Product::paginate(4);
        } else {
            $products = Product::where('category_id', $category_id)->paginate(4);
        }

        return view('list_product', compact('products'));
    }

    public function detailProduct($id) {

        $product = Product::with('images', 'category')->with(['feedbacks' => function($query) {
            $query->join('users', 'feedbacks.user_id', '=', 'users.id')->where('feedbacks.status', 1)->select('feedbacks.*', 'users.name', 'users.image')->get();
        }])->findOrFail($id);

        $toppings = Topping::all();

        $sizes = Size::all();

        return view('detail_product', compact('product', 'toppings', 'sizes'));
    }

    public function comment(Request $request)
    {
        $feedback = new Feedback();

        $feedback->user_id = Auth::id();

        $feedback->product_id = $request->product_id;

        $feedback->content = $request->comment;

        $feedback->status = 0;

        $feedback->save();
    }

    public function orders()
    {
        if(Auth::check())
        {
            $user_id = Auth::id();
            $orders = Order::where('user_id', $user_id)->get();

            return view('list_order', compact('orders'));
        }

        return abort(404);
    }

    public function order_details($order_id)
    {
        $orderDetails = OrderDetail::with('product', 'size', 'toppings')->where('order_id', $order_id)->get();

        return $orderDetails;
    }
    public function cancel_order($order_id)
    {
        $order = Order::findOrfail($order_id);

        $order->status = -1;

        $order->save();
    }
}
