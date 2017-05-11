<?php

namespace App\Http\Controllers\Category;

use App\Http\Requests\Category\StoreValidation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = App\Category::all();
        return view('admin.category.index', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Category\StoreValidation $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreValidation $request)
    {
        $category = App\Category::create($request->all());
        return $category;//automaticamente se convierte json
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = App\Category::findOrFail($id);
        return $category;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Category\StoreValidation $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreValidation $request, $id)
    {
        $category = App\Category::findOrFail($id);
        $category->name = $request->name;
        $category->info = $request->info;
        $category->save();
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = App\Category::findOrFail($id);
        $category->delete();
        return $category;
    }
}
