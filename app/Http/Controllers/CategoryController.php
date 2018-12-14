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
        return view('admin.category_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryModel->create([
            'name' => $request->name,
        ]);
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->categoryModel->update([
            'name' => $request->name,
        ], $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryModel->delete($id);
    }

    public function getCategoryJson()
    {
        $categories = Category::withCount('products')->get();

        return datatables($categories)->make(true);
    }
}
