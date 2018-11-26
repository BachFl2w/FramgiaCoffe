<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $successOrder = Order::where('status', 1)->get();
        $canceledOrder = Order::where('status', -1)->get();
        $popularProduct = OrderDetail::with('product')->orderBy('product_id')->get();
        // return view('admin.index', compact('successOrder', 'canceledOrder'));
        return $popularProduct;
    }

    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }
}
