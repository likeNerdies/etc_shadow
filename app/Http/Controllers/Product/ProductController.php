<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UploadProduct;
use App;

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
        //carpeta product, dentro index.blade.php (sera el index de productos)
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients=App\Ingredient::all();
        $categories=App\Category::all();
        return view ('product.create',compact(['ingredients','categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Product\UploadProduct $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadProduct $request)
    {
        DB::transaction(function ()use ($request) {//iniciando transaccion
            $product = App\Product::create($request->all());//guardando producto
            if ($request->hasFile('photos')) {//si existen fotos
                foreach ($request->photos as $photo) {//recorriendo todas las fotos
                    $path = Storage::putFile('public/product_images', $photo);//guardando fotos en el directorio storage/app/public/product_images
                    // $filename = $photo->store('photos');//guardando fotos
                    App\Image::create([
                        'path' => $path,
                        'size' => Storage::size($path),
                        //'extension' => pathinfo($path, PATHINFO_EXTENSION),
                        'extension'=>$photo->extension(),
                        'product_id' => $product->id
                    ]);
                }
            }
            $product->categories()->attach($request->categories);//guardando relacion con categorias y productos
            $product->ingredients()->attach($request->ingredients);//guardando relacion con ingredientes y productos
            $product->brand_id=$request->brand_id;
        });
        return redirect('product.index');
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
        //carpeta product, dentro show.blade.php
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = App\Product::findOrFail($id);
        //carpeta product, dentro edit.blade.php
        return view('product.edit', compact('product'));
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
        DB::transaction(function ()use ($request,$id) {//iniciando transaccion
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
            $product->brand_id=$request->brand_id;
            $product->save();
        });
        return redirect('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function ($id) {//iniciando transaccion
            $product = App\Product::findOrFail($id);
            //deleting all images
            $images = $product->images;

            foreach ($images as $image) {
                Storage::delete($image->path);
            }
            $product->delete();
            return redirect('/');
        });
    }
}
