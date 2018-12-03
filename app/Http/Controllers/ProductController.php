<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Image;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $products = Product::with('category')->get();

        foreach ($products as $key => $product) {

            $images = Image::where('product_id', $product->id)->orderBy('active', 'desc')->orderBy('id', 'desc')->get();
            $image = null;
            if (count($images) != 0) {

                $image = $images[0]->name;
            }

            $products[$key]->image = $image;
        }

        return view('admin.product_list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::pluck('name', 'id');

        return view('admin.product_create', compact('categories'));
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

        toast()->success(__('message.success.create'), 'success');

        return route('admin.product.index');
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
        $product = Product::findOrFail($id);

        $images = Image::where('product_id', $product->id)->orderBy('active', 'desc')->orderBy('id', 'desc')->get();
        $image = null;
        if (count($images) != 0) {

            $image = $images[0]->name;
        }

        $product->image = $image;

        $categories = Category::pluck('name', 'id');

        return view('admin.product_update', compact('product', 'categories'));
    }

    public function productJson($id)
    {
        $product = Product::findOrFail($id);

        $images = Image::where('product_id', $product->id)->orderBy('active', 'desc')->orderBy('id', 'desc')->get();
        $image = null;
        if (count($images) != 0) {

            $image = $images[0]->name;
        }

        $product->image = $image;

        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->name = $request->name;

        $product->price = $request->price;

        $product->quantity = $request->quantity;

        $product->category_id = $request->category_id;

        $product->description = $request->description;

        $product->save();

        $image = $request->file('image');

        if ($image != null) {

            $filename = $product->name . '_' . $image->getClientOriginalName();

            $path = public_path('images/products/' . $filename);

            $image_resize = Images::make($image->getRealPath())->resize(600, 348)->save($path);

            $img = new Image();

            $img->name = $filename;

            $img->product_id = $product->id;

            $img->save();
        }

        toast()->success(__('message.success.update'), 'success');

        return redirect()->route('admin.product.index');
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

        toast()->success(__('message.success.delete'), 'success');

        return redirect()->route('admin.product.index');
    }

    public function getMainImage($product_id)
    {
        $image = Image::where('product_id', $product_id)->where('active', 1)->get();

        return $image;
    }

    public function getImages(Request $request)
    {
        $product_id = $request->id;

        $images_data = Image::where('product_id', $product_id)->get();

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
