<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Images;
use App\Products;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products_data = Products::all();

        return view('admin.product_list', ['products' => $products_data]);
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
    public function store(ProductRequest $request)
    {
         $product = new Products();

         $product->name = $request->name;

         $product->price = $request->price;

         $product->quantity = $request->quantity;

         $product->category_id = $request->category_id;

         $product->description = $request->description;

         $product->save();

        // $image = $request->file('image');

        // $filename = $image->getClientOriginalName();

        // $image_resize = Image::make($image->getRealPath());

        // $image_resize->resize(600, 348);

        // $thumbPath = public_path() . '/images/product';

        // $image_resize->move($thumbPath, $hashname);
//        $product->id;

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
        $product = Products::find($id);

        $product->name = $request->name;

        $product->price = $request->price;

        $product->quantity = $request->quantity;

        $product->category_id = $request->category_id;

        $product->description = $request->description;

        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);

        $product->delete();
    }

    public function getDataJson()
    {
        $products_data = Products::all()->load('category');

        return $products_data;
    }

    public function getImages(Request $request)
    {
        $product_id = $request->id;
        $images_data = Images::where('product_id',$product_id)->get();

        return $images_data;
    }

    public function uploadImage(Request $request)
    {
        $images = $request->images;
        $product_id = $request->product_id;
        if($request->hasFile('images'))
        {
            return 'Co';
        }
        else{
            return 'Ko';
        }



    }
}
