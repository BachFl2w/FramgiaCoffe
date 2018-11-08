<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Images;
use function MongoDB\BSON\toJSON;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products_data = Product::all();

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
         $product = new Product();

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
        $product = DB::table('products')
            ->join('images','products.id','=','images.product_id')
            ->join('categories','products.category_id', 'categories.id')
            ->select('products.id', 'products.name as name', 'price', 'quantity', 'description', 'images.name as main_image', 'categories.id as category_id')
            ->where([
                ['images.active', '=', 1],
                ['products.id', '=', $id],
            ])->get();

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
        $product = Product::find($id);

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
        $product = Product::find($id);

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
