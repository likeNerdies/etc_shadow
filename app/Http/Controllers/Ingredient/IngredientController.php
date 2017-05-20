<?php

namespace App\Http\Controllers\Ingredient;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ingredient\StoreValidation;
use App\Http\Requests\Ingredient\StoreImage;
use DB;
use Intervention\Image\ImageManagerStatic as Image;


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

        // return response()->json(["name"=>$request->name]);
        // return response()->json(["hasfile"=>$request->hasFile('photo')]);
        $inserted = true;
        $ingredient = "";
        try {
            DB::beginTransaction();
            $ingredient = App\Ingredient::create($request->all());
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
        return response()->json($retorn);
    }





    /**
     * Store a newly image resource in storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    /*  public function storeImage(Request $request, $id)
      {
          //return response()->json(["fichero"=>$request->hasFile('image')]);
          $inserted = true;
          $path = "";
          try {
              DB::beginTransaction();
              //  $img = Image::make( $request->image);
              $ingredient = App\Ingredient::findOrFail($id);
              if ($ingredient->image_path != null) {
                  Storage::delete($ingredient->image_path);
              }
              if ($request->hasFile('image')) {//si existen fotos
                  $path = Storage::putFile('public/ingredient_images', $request->image);//guardando fotos en el directorio storage/app/public/product_images
                  $ingredient->image_path = $path;
              }
              $ingredient->save();
              DB::commit();
          } catch (Exception $e) {
              DB::rollBack();
              $inserted = false;
          }
          $retorn = [];
          if ($inserted) {
              $retorn = [
                  "image_path" => Storage::url($path)
              ];
          } else {
              $retorn = [
                  "success" => false,
              ];
          }
          return response()->json($retorn);
      }*/

    public function storeImage(StoreImage $request, $id)
    {
        $inserted = true;
        try {
            DB::beginTransaction();
                $ingredient = App\Ingredient::findOrFail($id);
                if ($request->hasFile('image')){
                $file = Input::file('image');
                $img = Image::make($file);
                Response::make($img->encode('jpeg'));
                $ingredient->image = $img;
                $ingredient->save();
            }else{
                $inserted=false;
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $inserted = false;
        }

        if ($inserted) {
            $retorn = [
                "id" => $ingredient->id
            ];
        } else {
            $retorn = [
                "success" => false,
            ];
        }

        return response()->json($retorn);

    }

    public function showPicture($id)
    {
        $ingredient = App\Ingredient::findOrFail($id);
        $pic = Image::make($ingredient->image);
        $response = Response::make($pic->encode('jpeg'));
        //setting content-type
        $response->header('Content-Type', 'image/jpeg');
        return $response;
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
        return response()->json($retorn);
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
        // return response()->json(["name"=>$request->name]);
        $ingredient = "";
        $retorn = [];
        // DB::transaction(function () use ($request, $ingredient, $id) {//iniciando transaccion
        $updated = true;
        try {
            DB::beginTransaction();
            $ingredient = App\Ingredient::findOrFail($id);
            $ingredient->name = $request->name;
            $ingredient->info = $request->info;
            $ingredient->allergies()->sync($request->allergies);
            $ingredient->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $updated = false;
        }
        // });
        if ($updated) {
            $retorn = [
                "ingredient" => $ingredient,
                "allergies" => $ingredient->allergies
            ];
        } else {
            $retorn = [
                "success" => false
            ];
        }
        return response()->json($retorn);
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
        Storage::delete($ingredient->image_path);
        $ingredient->delete();
        return $ingredient;

    }
}
