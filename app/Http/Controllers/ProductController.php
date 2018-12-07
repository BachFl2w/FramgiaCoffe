<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\Category;
use App\Image;
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
     * @param  \Illuminate\Http\Request $request
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
        $product = Product::findOrFail($id);

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
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
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

            Images::make($image->getRealPath())->resize(600, 348)->save($path);

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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        toast()->success(__('message.success.delete'), 'success');

        return redirect()->route('admin.product.index');
    }

    public function getAllData()
    {
        $product = Product::all()->with(['images' => function($query) {
            $query->orderBy('');
        }]);

        return $product;
    }
}
