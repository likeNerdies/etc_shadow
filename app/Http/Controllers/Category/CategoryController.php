<?php

namespace App\Http\Controllers\Category;

use App\Http\Requests\Category\StoreValidation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

/**
 * Class CategoryController
 * This Class controlls the Category model
 * @package App\Http\Controllers\Category
 */
class CategoryController extends Controller
{
    /**
     * Returns the admin categoreis view with pagination of 15
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = App\Category::paginate(15);
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
     * Display the specified category resource.
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
     * Update the specified resource category in storage.
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
