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
        $allergies=App\Allergy::all();
        return view('admin.ingredient.index', compact(["ingredients","allergies"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Ingredient\StoreValidation $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreValidation $request)
    {
        $ingredient="";
        DB::transaction(function ()use ($request,$ingredient) {//iniciando transaccion
            $ingredient = App\Ingredient::create($request->all);
            if ($request->hasFile('photo')) {//si existen fotos
                $path = Storage::putFile('public/ingredient_images', $request->photo);//guardando fotos en el directorio storage/app/public/ingredient_images
                $ingredient->image_path = $path;
                $ingredient->allergies()->attach($request->allergies);
                $ingredient->save();
            }
        });
        return $ingredient;
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
        return $ingredient;
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
        $ingredient="";
        DB::transaction(function ()use ($request,$ingredient,$id) {//iniciando transaccion
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
        });
        return $ingredient;
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
        return $ingredient;

    }
}
