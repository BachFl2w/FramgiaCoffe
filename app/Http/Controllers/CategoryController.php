<?php

namespace App\Http\Controllers;

use App\Category;
use App\Repositories\Repository;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Aler;

class CategoryController extends Controller
{
    protected $categoryModel;

    public function __construct(Category $categoryModel)
    {
        // set the model
        $this->categoryModel = new Repository($categoryModel);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories_data = Category::all();

        // if (!Redis::get('catogory:all')) {
        //     // $name, $with from repository
        //     $this->categoryModel->setRedisAll('catogory:all', []);
        // }

        // // set true to return array
        // $data = json_decode(Redis::get('catogory:all'), true);
        // return datatables($data)->make(true);

        return view('admin.category_list', ['categories' => $categories_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();

        $category->name = $request->name;

        $category->save();

        toast()->success(__('message.success.create'), 'success');

        // // $name, $with
        // $this->categoryModel->setRedisAll('category:all', []);
        // // $name, $id, $data
        // $this->categoryModel->setRedisById('category:' . $category->id, $category);

        return redirect()->route('admin.category.index');
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
        $category = Category::findOrFail($id);

        return view('admin.category_update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category =  Category::findOrFail($id);

        $category->name = $request->name;

        $category->save();

        toast()->success(__('message.success.update'), 'success');

        // $this->categoryModel->setRedisAll('category:all', []);
        // $this->categoryModel->setRedisById('category:' . $category->id, $data);

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $this->categoryModel->setRedisAll('category:all', ['role']);
        $this->categoryModel->deleteRedis('category:' . $category->id);

        $category->delete();

        toast()->success(__('message.success.delete'), 'success');

        return redirect()->route('admin.category.index');
    }

    public function getCategoryJson()
    {
        $categories_data = Category::all();

        return $categories_data;

        /*if (!Redis::get('category:all')) {
            // $name, $with from repository
            $this->categoryModel->setRedisAll('category:all', []);
        }

        // set true to return array
        $data = json_decode(Redis::get('category:all'), true);

        return datatables($data)->make(true);*/
    }
}
