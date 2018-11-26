<?php

namespace App\Http\Controllers;


use App\Order;
use App\OrderDetail;
use App\Image;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('admin.order_list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
            $priceProduct = $orderDetail->product_price * $orderDetail->quantity;
            $priceTopping = 0;
            foreach ($orderDetail->toppings as $topping) {
                $priceTopping += $topping->pivot->topping_price ;
            }
            $orderDetails[$index]->price = $priceProduct + $priceTopping;
            $orderDetails[$index]->status = $order->status;
            $index ++;
        }

        return view('admin.order_detail', compact('orderDetails', 'order'));
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
        $order = Order::findOrFail($id);
        $order->receiver = $request->receiver;
        $order->order_phone = $request->order_phone;
        // $order->order_time = $request->order_time;
        $order->order_place = $request->order_place;
        $order->note = $request->note;
        $order->status = $request->status;
        $order->save();
        toast()->success(__('message.success.update'), 'success');

        return redirect()->route('admin.order.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        toast()->success(__('message.success.delete'), 'success');

        return redirect()->route('admin.order.index');
    }
}
