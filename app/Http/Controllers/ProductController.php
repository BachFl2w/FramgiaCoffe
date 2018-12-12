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
        $categories = Category::pluck('name', 'id');

        return view('admin.product_list', compact('categories'));
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
        $product = $this->productModel->create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'brif' => $request->brif,
            'description' => $request->description,
            'discount' => $request->discount,

        ]);
        //save image
        $image = $request->file('image');

        $filename = $product->name . '_' . $image->getClientOriginalName();

        $path = public_path(config('asset.image_path.product') . $filename);

        Images::make($image->getRealPath())->resize(600, 600)->save($path);

        $img = $this->imageModel->create([
            'name' => $filename,
            'product_id' => $product->id,
            'active' => 1,
        ]);

        // $key, $with
        // $this->productModel->setRedisAll('product:all', ['categories', 'image']);
        // $key + $id, $data du lieu sau khi duoc update
        // $this->productModel->setRedisById('product:' . $product->id, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('category')->with(['images' => function($query) {
            $query->where('active', 1)->get();
        }])->findOrFail($id);

        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $product = Product::findOrFail($id);

        // $categories = Category::pluck('name', 'id');

        // return view('admin.product_update', compact('product', 'categories'));
    }

    public function productJson($id)
    {
        // $product = Product::findOrFail($id);

        // $images = Image::where('product_id', $product->id)->orderBy('active', 'desc')->orderBy('id', 'desc')->get();
        // $image = null;
        // if (count($images) != 0) {

        //     $image = $images[0]->name;
        // }

        // $product->image = $image;

        // return $product;
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
        $product = $this->productModel->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'brif' => $request->brif,
            'description' => $request->description,
            'discount' => $request->discount,
        ], $id);

        $image = $request->file('image');

        if ($image != null) {

            $filename = $request->name . '_' . $image->getClientOriginalName();

            $path = public_path('images/products/' . $filename);

            Images::make($image->getRealPath())->resize(600, 600)->save($path);

            $img = $this->imageModel->create([
                'name' => $filename,
                'product_id' => $id,
                'active' => 1,
            ]);

            Image::where('product_id', '=', $id)->whereNotIn('id', [$img->id])->update(['active' => 0]);

        }

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
        $products = Product::with(['images' => function($query) {
            $query->where('active', 1)->get();
        }])->with('category')->orderBy('id', 'desc')->get();

        return $products;
    }
}
