<?php

namespace App\Http\Controllers\Ingredient;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ingredient\StoreValidation;
use DB;
use Mockery\Exception;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = App\Ingredient::paginate(9);
        return view('admin.ingredient.index', compact(["ingredients"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Ingredient\StoreValidation $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreValidation $request)
    {
        $inserted = true;
        $ingredient = "";
        try {
            $ingredient = App\Ingredient::create($request->all());
            DB::beginTransaction();
            if ($request->hasFile('photo')) {//si existen fotos
                $path = Storage::putFile('public/ingredient_images', $request->photo);//guardando fotos en el directorio storage/app/public/ingredient_images
                $ingredient->image_path = $path;
            }
            $ingredient->allergies()->attach($request->allergies);
            $ingredient->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $inserted = false;
        }
        $retorn = [];
        if ($inserted) {
            $retorn = [
                "ingredient" => $ingredient,
                "allergies" => $ingredient->allergies
            ];
        } else {
            $retorn = [
                "success" => false,
            ];
        }
        return $retorn;
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
        $retorn = [
            "ingredient" => $ingredient,
            "allergies" => $ingredient->allergies
        ];
        return $retorn;
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
        $ingredient = "";
        $retorn=[];
       // DB::transaction(function () use ($request, $ingredient, $id) {//iniciando transaccion
        $updated=true;
        try{
            DB::beginTransaction();
            $ingredient = App\Ingredient::findOrFail($id);
            $ingredient->name = $request->name;
            $ingredient->info = $request->info;
            if ($request->hasFile('photo')) {//si existen fotos
                if ($ingredient->image_path != null) {
                    Storage::delete($ingredient->image_path);
                }
                $path = Storage::putFile('public/ingredient_images', $request->photo);//guardando fotos en el directorio storage/app/public/ingredient_images
                $ingredient->image_path = $path;
            }
            $ingredient->allergies()->sync($request->allergies);
            $ingredient->save();
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            $updated=false;
        }
       // });
        if($updated){
            $retorn=[
              "ingredient"=>$ingredient,
              "allergies"=>$ingredient->allergies
            ];
        }else{
            $retorn=[
              "success"=>false
            ];
        }
        return $retorn;
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
