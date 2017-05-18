<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UploadProduct;
use App;
use Mockery\Exception;
use DB;

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
        $brands = App\Brand::all();
        return view('admin.product.index', compact(['products', 'brands']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productsIndex()
    {
        $products = App\Product::paginate(9);
        return view('product.index', compact(['products', 'brands']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productsIndexShow($id)
    {
        $products = App\Product::findOrFail($id);
        return view('admin.product.show', compact(['products', 'brands']));
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
        $product = "";
        $inserted = false;
        $retorn = [];
        try {

            DB::beginTransaction();
            //return response()->json(["0k"=>"ok"]);
            $product = App\Product::create($request->all());//guardando producto
            //return response()->json(["0k"=>"ok"]);
            $product->categories()->attach($request->categories);//guardando relacion con categorias y productos
            $product->ingredients()->attach($request->ingredients);//guardando relacion con ingredientes y productos
            $product->brand()->associate($request->brand_id);
            DB::commit();
            $inserted = true;
        } catch (Exception $e) {
            DB::rollBack();
        }
        if (!$inserted) {
            $retorn = [
                'error' => "Failed inserting model in database"
            ];
        } else {
            $retorn = [
                "product" => $product,
                "ingredients" => $product->ingredients,
                "categories" => $product->categories,
                "brand" => $product->brand,
                "brands" => App\Brand::all(),
                "images" => $product->images,
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
    public function storeImage(Request $request, $id)
    {
        // return response()->json(["fichero"=>$request->image]);
        $inserted = true;
        $path = "";
        $image_path = [];
        try {
            DB::beginTransaction();
            //  $img = Image::make( $request->image);
            if ($request->hasFile('image')) {//si existen fotos
                $product = App\Product::findOrFail($id);
                //deleting old images
                $oldImages = $product->images;
                if ($oldImages != null) {
                    foreach ($oldImages as $oldImage) {
                        Storage::delete($oldImage->path);
                        $oldImage->delete();
                    }
                }

                //adding new images

                foreach ($request->image as $photo) {//recorriendo todas las fotos
                    // return response()->json(["fichero"=>count($request->image)]);
                    $path = Storage::putFile('public/product_images', $photo);//guardando fotos en el directorio storage/app/public/product_images
                    $image_path[] = Storage::url($path);
                    // $filename = $photo->store('photos');//guardando fotos
                    App\Image::create([
                        'name' => $photo->getClientOriginalName(),
                        'path' => $path,
                        'size' => Storage::size($path),
                        'extension' => pathinfo($path, PATHINFO_EXTENSION),
                        'product_id' => $product->id
                    ]);
                }
            }


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $inserted = false;
            //delete inserted files-----------------todo
        }
        $retorn = [];
        if ($inserted) {
            $retorn = [
                "image_path" => $image_path
            ];
        } else {
            $retorn = [
                "success" => false,
            ];
        }
        return response()->json($retorn);
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
        $retorn = [
            "product" => $product,
            "ingredients" => $product->ingredients,
            "categories" => $product->categories,
            "brand" => $product->brand,
            "brands" => App\Brand::all(),
            "images" => $product->images,
        ];
        return response()->json($retorn);
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
        //   if ($request->ajax()) {
        $retorn = [];
        DB::beginTransaction();
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
            $product->ingredients()->sync($request->ingredients);//eliminando antiguas relaciones y guardando nuevas relaciones con ingredientes y productos
            $product->categories()->sync($request->categories);//eliminando antiguas relaciones y guardando nuevas relaciones con categorias y productos
            $product->brand()->associate($request->brand_id);
            $product->save();
            //  });
            DB::commit();
            $inserted = true;
        } catch (Exception $e) {
            DB::rollBack();
        }
        if (!$inserted) {
            $retorn = [
                'error' => "Failed inserting model in database"
            ];
        } else {
            $retorn = [
                "product" => $product,
                "ingredients" => $product->ingredients,
                "categories" => $product->categories,
                "brand" => $product->brand,
                "brands" => App\Brand::all(),
                "images" => $product->images,
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
        $deleted = "";
        // DB::transaction(function ($id) {//iniciando transaccion
        try {
            DB::beginTransaction();
            $product = App\Product::findOrFail($id);
            //deleting all images
            $images = $product->images;

            foreach ($images as $image) {
                Storage::delete($image->path);
                $image->delete();
            }
            $product->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $deleted = false;
        }
        //  });
        return response()->json(["deleted" => $deleted]);
    }
}
