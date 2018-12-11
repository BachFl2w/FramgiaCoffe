<?php

namespace App\Http\Controllers;

use Cache;
use Redis;

use App\Product;
use App\Category;
use App\Image;
use App\Http\Requests\ProductRequest;
use App\Repositories\Repository;

use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\ImageManagerStatic as Images;

class ProductController extends Controller
{
    protected $productModel;
    protected $categoryModel;
    protected $imageModel;

    public function __construct(Product $productModel, Category $categoryModel, Image $imageModel)
    {
        $this->productModel = new Repository($productModel);
        $this->categoryModel = new Repository($categoryModel);
        $this->imageModel = new Repository($imageModel);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();

        // sau khi chuyen sang ajax, dung luon doan nay`
        // if (!Redis::get('product:all')) {
        //     // $key, load() from repository
        //     $this->productModel->setRedisAll('product:all', ['categories', 'images']);
        // }

        // set true to return array
        // $data = json_decode(Redis::get('user:all'), true);

        // đoạn này ở giao diện gọi ajax ra
        // truyền thẳng data ra giao diện hoặc viết thêm func get json cũng được
        // return datatables($data)->make(true);

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
        // chuyen het code dung repository
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

        // $key, $with
        // $this->productModel->setRedisAll('product:all', ['categories', 'image']);
        // $key + $id, $data du lieu sau khi duoc update
        // $this->productModel->setRedisById('product:' . $product->id, $data);

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

        // $key, $with
        // $this->productModel->setRedisAll('product:all', ['category', 'image']);
        // $key + $id, $data du lieu sau khi duoc update
        // $this->productModel->setRedisById('product:' . $product->id, $data);
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
        // $key, $with
        // $this->productModel->setRedisAll('product:all', ['category', 'image']);
        // $key + $id, $data du lieu sau khi duoc update
        // $this->productModel->deleteRedis('product:' . $product->id);
        // xóa tất thì truyền product:all vào

        $product->delete();

        toast()->success(__('message.success.delete'), 'success');

        return redirect()->route('admin.product.index');

    }

    public function getAllData()
    {
        // // get all product
        // if (!Redis::get('product:all')) {
        //     // $name, $with from repository
        //     $this->userModel->setRedisAll('product:all', ['categories', 'images']);
        // }

        // // set true to return array
        // $data = json_decode(Redis::get('product:all'), true);
        // return datatables($data)->make(true);

        // order by co the truyen tham so vao` datatable luc khoi tao var table
        $product = Product::all()->with(['images' => function($query) {
            $query->orderBy('');
        }]);

        return $product;
    }
}
