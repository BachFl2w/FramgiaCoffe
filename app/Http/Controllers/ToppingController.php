<?php

namespace App\Http\Controllers;

use App\Topping;
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
        $toppings = Topping::all();

        return view('admin.topping_list', compact('toppings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.topping_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topping = new Topping();

        $topping->name = $request->name;

        $topping->price = $request->price;

        $topping->quantity = $request->quantity;

        $topping->save();

        return redirect()->route('admin.topping.index');
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
        $topping = Topping::findOrFail($id);

        return view('admin.topping_update', compact('topping'));
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
        $topping = Topping::findOrFail($id);

        $topping->name = $request->name;

        $topping->price = $request->price;

        $topping->quantity = $request->quantity;

        $topping->save();

        return redirect()->route('admin.topping.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topping = Topping::findOrFail($id);

        $topping->delete();

        return redirect()->route('admin.topping.index');
    }

    public function getDataJson()
    {
        $data_topping = Topping::all();

        return $data_topping;
    }
}
