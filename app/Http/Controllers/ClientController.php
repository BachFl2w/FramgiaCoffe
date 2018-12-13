<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Http\Requests\Client_UserRequest;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Redis;
use Cache;

class ClientController extends Controller
{
    public function index()
    {
        $best_discount_product = Product::with(['images' => function ($query) {
            $query->orderBy('id', 'desc')->limit(1);
        }])
            ->orderBy('discount', 'desc')
            ->orderBy('id', 'desc')
            ->first();

        $products = OrderDetail::with('product.images')
            ->orderBy('id', 'desc')
            ->limit(6)
            ->get();

        return view('index', compact('products', 'best_discount_product'));
    }

    public function listProduct()
    {
        if(!Redis::get('products')) {
            $products = Product::with(['category' => function ($query) {
                $query->get();
            }])->paginate(4);
            Redis::set('products', json_encode($products));
        }
        else
        {
            $products = json_decode(Redis::get('products'));
        }

        return view('list_product', compact('products'));
    }

    public function liveSearch(Request $request)
    {
        $keyword = $request->keyword;
        $data = [];
        if ($keyword != null) {
            $data = Product::where('name', 'like', '%' . $keyword . '%')->limit(4)->get();
        }

        return $data;
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $products = [];
        if ($keyword != null) {
            $products = Product::where('name', 'like', '%' . $keyword . '%')->paginate(5);
        }

        return view('list_result_search', compact('products'));
    }

    public function detailProduct($id)
    {
        $product = Product::with('category')->with(['images' => function ($query) {
            $query->orderBy('active', 'desc')
                ->orderBy('id', 'desc')->first();
        }])->findOrFail($id);

        $products = Product::with('category')->with(['images' => function ($query) {
            $query->orderBy('active', 'desc')
                ->orderBy('id', 'desc')->get();
        }])->where('category_id', '=', $product->category->id)
            ->whereNotIn('id', [$product->id])
            ->limit(3)->get();

        $feedback = Feedback::where('product_id', $id)->with('user')->get();

        return view('product_detail', compact('product', 'feedback', 'products'));
    }

    public function detailProductData($id)
    {
        $product = Product::with('category')->with(['images' => function ($query) {
            $query->orderBy('active', 'desc')
                ->orderBy('id', 'desc')->first();
        }])->findOrFail($id);

        return $product;
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
        if (Auth::check()) {
            $user_id = Auth::id();
            $orders = Order::where('user_id', $user_id)->orderBy('id', 'desc')->paginate(8);

            return view('order', compact('orders'));
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

    public function cart()
    {
        $carts = [];
        if (Session::has('cart')) {
            $carts = Session('cart');
        }

        return view('cart', compact('carts'));
    }

    public function profile()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function registerPost(Client_UserRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $newName = str_random(4) . '_' . $name;
            while (file_exists(config('asset.image_path.avatar') . $newName)) {
                $newName = str_random(4) . '_' . $name;
            }
            $file->move(config('asset.image_path.avatar'), $newName);
            $image = $newName;
        } else {
            $image = null;
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->image = $image;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->role_id = 3;
        $user->save();
    }

    public function filter(Request $request)
    {
        $category_id = $request->input('category_id') ? $request->input('category_id') : 0;
        $category = Category::find($category_id);
        $categories = Category::all();
        $products = Product::with(['images' => function ($query) {
            $query->orderBy('active', 'desc')->orderBy('id', 'desc')->get();
        }])->with('category')->orderBy('id', 'desc')
            ->when($category_id, function ($query, $category_id) {
                return $category_id != 0 ? $query->where('category_id', '=', $category_id) : $query->get();
            })
            ->paginate(6);

        return view('filter', compact('categories', 'products', 'category'));
    }

    public function favorite(Request $request)
    {
        $product = Product::findOrFail($request->id);

        if (Auth::check()) {
            Auth::user()->products()->attach($product);
        }
    }

    public function checkout(Request $request)
    {

    }
}
