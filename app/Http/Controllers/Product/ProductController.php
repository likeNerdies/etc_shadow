<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UploadProduct;
use App;
use Mockery\Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = App\Product::paginate(9);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     * public function create()
     * {
     * $ingredients=App\Ingredient::all();
     * $categories=App\Category::all();
     * return view ('product.create',compact(['ingredients','categories']));
     * }
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Product\UploadProduct $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadProduct $request)
    {
        $fotoinserted = array();//lo usaremos para guardar los path de los imagenes insertados
        if ($request->ajax()) {
            DB::beginTransaction();
            $product = "";
            $inserted = false;
            try {
                // DB::transaction(function ()use ($request) {//iniciando transaccion
                $product = App\Product::create($request->all());//guardando producto
                if ($request->hasFile('photos')) {//si existen fotos
                    $i = 0;
                    foreach ($request->photos as $photo) {//recorriendo todas las fotos
                        $path = Storage::putFile('public/product_images', $photo);//guardando fotos en el directorio storage/app/public/product_images
                        $fotoinserted[$i] = $path;
                        // $filename = $photo->store('photos');//guardando fotos
                        App\Image::create([
                            'path' => $path,
                            'size' => Storage::size($path),
                            //'extension' => pathinfo($path, PATHINFO_EXTENSION),
                            'extension' => $photo->extension(),
                            'product_id' => $product->id
                        ]);
                        $i++;
                    }
                }
                $product->categories()->attach($request->categories);//guardando relacion con categorias y productos
                $product->ingredients()->attach($request->ingredients);//guardando relacion con ingredientes y productos
                $product->brand_id = $request->brand_id;
                DB::commit();
                $inserted = true;
            } catch (Exception $e) {
                DB::rollBack();
                //en el caso de haver guardado imagenes, se eliminan cuando salta error.
                if (count($fotoinserted) > 0) {
                    foreach ($fotoinserted as $item) {
                        Storage::delete($item);
                    }
                }
            }
            // });
            if (!$inserted) {
                return response()->json([
                    'error' => "Failed inserting model in database"
                ]);
            }
            return $product;
        } else {
            return response()->json([
                'error' => 'method only accepts ajax request'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = App\Product::findOrFail($id);
        return $product;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\Product\UploadProduct $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadProduct $request, $id)
    {
        $product = "";
        // DB::transaction(function () use ($request, $id) {//iniciando transaccion
        $inserted = false;
        if ($request->ajax()) {
            try {
                $product = App\Product::findOrFail($id);
                $product->name = $request->name;
                $product->price = $request->price;
                $product->description = $request->description;
                $product->expiration_date = $request->expiration_date;
                $product->dimension = $request->dimension;
                $product->weight = $request->weight;
                $product->real_weight = $request->real_weight;
                $product->stock = $request->stock;
                if (isset($request->vegetarian)) {
                    $product->vegetarian = $request->vegetarian;
                }
                if (isset($request->vegan)) {
                    $product->vegan = $request->vegan;
                }
                if (isset($request->organic)) {
                    $product->organic = $request->organic;
                }

                //deleting old images
                $oldImages = $product->images;

                foreach ($oldImages as $oldImage) {
                    Storage::delete($oldImage->path);
                }

                //adding new images
                if ($request->hasFile('photos')) {//si existen fotos
                    foreach ($request->photos as $photo) {//recorriendo todas las fotos
                        $path = Storage::putFile('public/product_images', $photo);//guardando fotos en el directorio storage/app/public/product_images
                        // $filename = $photo->store('photos');//guardando fotos
                        App\Image::create([
                            'path' => $path,
                            'size' => Storage::size($path),
                            'extension' => pathinfo($path, PATHINFO_EXTENSION),
                            'product_id' => $product->id
                        ]);
                    }
                }
                $product->ingredients()->sync($request->ingredients);//eliminando antiguas relaciones y guardando nuevas relaciones con ingredientes y productos
                $product->categories()->sync($request->categories);//eliminando antiguas relaciones y guardando nuevas relaciones con categorias y productos
                $product->brand_id = $request->brand_id;
                $product->save();
                //  });
                DB::commit();
                $inserted = true;
            } catch (Exception $e) {
                DB::rollBack();
            }
            if (!$inserted) {
                return response()->json([
                    'error' => 'Failed updating model in database'
                ]);
            }
            return $product;

        } else {
            return response()->json([
                'error' => 'method only accepts ajax request'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = "";
        DB::transaction(function ($id) {//iniciando transaccion
            $product = App\Product::findOrFail($id);
            //deleting all images
            $images = $product->images;

            foreach ($images as $image) {
                Storage::delete($image->path);
            }
            $product->delete();

        });
        return $product;
    }
}
