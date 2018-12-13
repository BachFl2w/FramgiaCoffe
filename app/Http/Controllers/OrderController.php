<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Image;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use Auth;

class OrderController extends Controller
{
    protected $orderModel;

    public function __construct(Order $orderModel)
    {
        $this->orderModel = new Repository($orderModel);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->orderModel->all();

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
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
            } else {
                $image = Image::where('product_id', $product_id)->orderBy('id', 'DESC')->first();
                $orderDetails[$index]->image = $image->name;
            }
            $priceProduct = $orderDetail->product_price * $orderDetail->quantity;
            $priceTopping = 0;
            foreach ($orderDetail->toppings as $topping) {
                $priceTopping += $topping->pivot->topping_price;
            }
            $orderDetails[$index]->price = $priceProduct + $priceTopping;
            $orderDetails[$index]->status = $order->status;
            $index++;
        }

        return view('admin.order_detail', compact('orderDetails', 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->orderModel->update([
            'receiver' => $request->receiver,
            'order_phone' => $request->order_phone,
            'order_place' => $request->order_place,
            'note' => $request->note,
            'status' => $request->status,
        ], $id);

        return redirect()->route('admin.order.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->role_id == 2)
        {
            return response()->json(['errors' => 'Not authorized.'],403);
        }
        $this->orderModel->delete($id);

        return redirect()->route('admin.order.index');
    }

    public function confirm($id)
    {
        $this->orderModel->update([
            'status' => 1,
        ], $id);

        
    }
}
