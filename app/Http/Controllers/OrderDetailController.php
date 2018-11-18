<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Image;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order_detail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        $orderDetails = OrderDetail::with('product', 'size', 'toppings')->where('order_id', $id)->get();

        $index = 0;

        $images = [];

        foreach ($orderDetails as $orderDetail) {

            $product_id = $orderDetail->product->id;

            $image = Image::where('product_id', $product_id)->where('active', 1)->first();

            if ($image != null) {

                $orderDetails[$index]->image = $image->name;
            }
            else {

                $image = Image::where('product_id', $product_id)->orderBy('id','DESC')->first();

                $orderDetails[$index]->image = $image->name;
            }

            $priceProduct = $orderDetail->product->price * (1 + $orderDetail->size->percent) * $orderDetail->quantity;

            $priceTopping = 0;

            foreach ($orderDetail->toppings as $topping) {

                $priceTopping += $topping->price ;

            }

            $orderDetails[$index]->price = $priceProduct + $priceTopping;

            $orderDetails[$index]->status = $order->status;

            $index ++;
        }

        return view('admin.order_detail', compact('orderDetails', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateQuantity(Request $request)
    {
        $orderDetail = OrderDetail::findOrFail($request->id);

        $orderDetail->quantity = $request->quantity;

        $orderDetail->save();
    }

    public function showJson($id)
    {
        $order = Order::findOrFail($id);

        $orderDetails = OrderDetail::with('product', 'size', 'toppings')->where('order_id', $id)->get();

        $index = 0;

        $images = [];

        foreach ($orderDetails as $orderDetail) {

            $product_id = $orderDetail->product->id;

            $image = Image::where('product_id', $product_id)->where('active', 1)->first();

            if ($image != null) {

                $orderDetails[$index]->image = $image->name;
            }
            else {

                $image = Image::where('product_id', $product_id)->orderBy('id','DESC')->first();

                $orderDetails[$index]->image = $image->name;
            }

            $priceProduct = $orderDetail->product->price * (1 + $orderDetail->size->percent) * $orderDetail->quantity;

            $priceTopping = 0;

            foreach ($orderDetail->toppings as $topping) {

                $priceTopping += $topping->price ;

            }

            $orderDetails[$index]->price = $priceProduct + $priceTopping;

            $orderDetails[$index]->status = $order->status;

            $index ++;
        }

        return $orderDetails;
    }

    public function showDetail(Request $request)
    {
        $order_id = $request->order_id;

        $detail_id = $request->detail_id;

        $order = Order::findOrFail($order_id);

        $orderDetails = OrderDetail::with('product', 'size', 'toppings')->where('order_id', $order_id)->get();

        $index = 0;

        foreach ($orderDetails as $orderDetail) {

            $product_id = $orderDetail->product->id;

            $image = Image::where('product_id', $product_id)->where('active', 1)->first();

            if ($image != null) {

                $orderDetails[$index]->image = $image->name;
            }
            else {

                $image = Image::where('product_id', $product_id)->orderBy('id','DESC')->first();

                $orderDetails[$index]->image = $image->name;
            }

            $priceProduct = $orderDetail->product->price * (1 + $orderDetail->size->percent) * $orderDetail->quantity;

            $priceTopping = 0;

            foreach ($orderDetail->toppings as $topping) {

                $priceTopping += $topping->price ;

            }

            $orderDetails[$index]->price = $priceProduct + $priceTopping;

            $index ++;
        }

        $orderDetailResult = null;

        foreach ($orderDetails as $orderDetail) {

            if($orderDetail->id == $detail_id) {

                $orderDetailResult = $orderDetail;

                break;
            }
        }

        return $orderDetailResult;
    }

}
