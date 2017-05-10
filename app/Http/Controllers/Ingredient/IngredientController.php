<?php

namespace App\Http\Controllers\Ingredient;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ingredient\StoreValidation;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = App\Ingredient::all();
        return view('ingredient.index', compact("ingredients"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Ingredient\StoreValidation $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreValidation $request)
    {
        $ingredient = App\Ingredient::create($request->all);
        if ($request->hasFile('photo')) {//si existen fotos
            $path = Storage::putFile('public/ingredient_images', $request->photo);//guardando fotos en el directorio storage/app/public/ingredient_images
            $ingredient->image_path = $path;
            $ingredient->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredient = App\Ingredient::findOrFail($id);
        return view('ingredient.show', compact('ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredient = App\Ingredient::findOrFail($id);
        return view('ingredient.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Ingredient\StoreValidation $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreValidation $request, $id)
    {
        $ingredient = App\Ingredient::findOrFail($id);
        $ingredient->name = $request->name;
        $ingredient->info = $request->info;
        if ($request->hasFile('photo')) {//si existen fotos
            if ($ingredient->image_path != null) {
                Storage::delete($ingredient->image_path);
            }
            $path = Storage::putFile('public/ingredient_images', $request->photo);//guardando fotos en el directorio storage/app/public/ingredient_images
            $ingredient->image_path = $path;
            $ingredient->save();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredient = App\Ingredient::findOrFail($id);
        $ingredient->delete();
        return redirect()->back();

    }
}
