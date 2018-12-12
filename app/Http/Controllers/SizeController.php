<?php

namespace App\Http\Controllers;

use App\Http\Requests\SizeRequest;
use App\Size;
use App\Repositories\Repository;

class SizeController extends Controller
{
    protected $sizeModel;

    public function __construct(Size $sizeModel)
    {
        $this->sizeModel = new Repository($sizeModel);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();

        return view('admin.size_list', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.size_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SizeRequest $request)
    {
        $this->sizeModel->create([
            'name' => $request->name,
            'percent' => $request->percent,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size = Size::findorFail($id);

        return view('admin.size_update', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SizeRequest $request, $id)
    {
        $this->sizeModel->update([
            'name' => $request->name,
            'percent' => $request->percent,
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
        $this->sizeModel->delete($id);
    }

    public function getDataJson()
    {
        $sizes = $this->sizeModel->all();

        return $sizes;
    }
}
