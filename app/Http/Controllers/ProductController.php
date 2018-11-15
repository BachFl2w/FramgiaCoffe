<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Images;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product_list');
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
        $product = new Product();

        $product->name = $request->name;

        $product->price = $request->price;

        $product->quantity = $request->quantity;

        $product->category_id = $request->category_id;

        $product->description = $request->description;

        $product->save();

        $image = $request->file('image');

        $filename = $product->name . '_' . $image->getClientOriginalName();

        $path = public_path('images/product/' . $filename);

        $image_resize = Images::make($image->getRealPath())->resize(600, 348)->save($path);

        $img = new Image();

        $img->name = $filename;

        $img->product_id = $product->id;

        $img->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')
            ->join('images','products.id','=','images.product_id')
            ->join('categories','products.category_id', 'categories.id')
            ->select('products.id', 'products.name as name', 'price', 'quantity', 'description', 'images.name as main_image', 'categories.id as category_id', 'active')
            ->where([
                'products.id', '=', $id,
            ])
            ->orderBy('active', 'desc')
            ->orderBy('images.product_id', 'desc')
            ->get();

        return $product;
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
        $product = Product::findOrFail($id);

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
        $product = Product::findOrFail($id);

        $product->delete();
    }

    public function getDataJson()
    {
        $products_data = Product::with('category')->get();

        return $products_data;
    }

    public function getImages(Request $request)
    {
        $product_id = $request->id;

        $images_data = Image::where('product_id',$product_id)->get();

        return $images_data;
    }

    public function uploadMoreImage(Request $request)
    {
        $images = $request->file('images');

        $product_id = $request->product_id;

        $product = Product::findOrFail($product_id);

        foreach ($images as $image) {

            $filename = $product->name . '_' . $image->getClientOriginalName();

            $path = public_path('images/product/' . $filename);

            $image_resize = Images::make($image->getRealPath())->resize(600, 348)->save($path);

            $img = new Image();

            $img->name = $filename;

            $img->product_id = $product->id;

            $img->save();
        }
    }

    public function changMainImage(Request $request)
    {
        $productId = $request->image_id;

        $mainImageId = $request->product_id;

        $currentMainImage = Image::where('product_id', $productId)->where('active', 1)->first();

        if ($currentMainImage != null) {

            $currentMainImage->active = 0;

            $currentMainImage->save();
        }

        $image = Image::findOrFail($mainImageId)->where('product_id', $productId)->first();

        $image->active = 1;

        $image->save();

    }
}
