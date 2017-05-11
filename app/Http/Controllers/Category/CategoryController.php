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
        $categories=App\Category::all();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('categoy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Category\StoreValidation  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreValidation $request)
    {
        $category=App\Category::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=App\Category::findOrFail($id);
        return view ('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=App\Category::findOrFail($id);
        return view ('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Category\StoreValidation  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreValidation $request, $id)
    {
        $category=App\Category::findOrFail($id);
        $category->name=$request->name;
        $category->info=$request->info;
        $category->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=App\Category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }
}
