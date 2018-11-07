<?php

namespace App\Http\Controllers;

use App\Toppings;
use Illuminate\Http\Request;

class TopingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.topping_list');
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
        $topping = new Toppings();

        $topping->name = $request->name;

        $topping->price = $request->price;

        $topping->quantity = $request->quantity;

        $topping->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $topping = Toppings::find($id);

        $topping->name = $request->name;

        $topping->price = $request->price;

        $topping->quantity = $request->quantity;

        $topping->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topping = Toppings::find($id);

        $topping->delete();
    }

    public function getDataJson()
    {
        $data_topping = Toppings::all();

        return $data_topping;
    }
}
