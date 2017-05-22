<?php

namespace App\Http\Controllers\Product;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UploadProduct;
use App;
use Mockery\Exception;
use App\Http\Requests\Ingredient\StoreImage;
use DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Image as Imagen;

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
        $product = App\Product::findOrFail($id);
        return view('product.show', compact(['product']));
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
            $product = App\Product::create($request->all());//guardando producto
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

        $inserted = true;
        try {
            DB::beginTransaction();
            if ($request->hasFile('image')) {//si existen fotos
                $product = App\Product::findOrFail($id);
                if(count($product->images)>0){
                   // $product->images()->detach(); detach is for belongstoMany
                    // $product->images()->dissociate();
                    foreach ($product->images as $item) {
                        $item->delete();//eliminamos las antiguas
                    }


                }
                //adding new images
                foreach (Input::file('image') as $photo) {//recorriendo todas las fotos
                    $img = Image::make($photo);
                    Response::make($img->encode('jpeg'));
                    App\Image::create([
                        'image' => $img,
                        'product_id' => $product->id
                    ]);
                }
            }
            $product->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $inserted = false;
        }
        $retorn = [];
        if ($inserted) {
            $retorn = [
                "images" => $product->images()->first()->id
            ];
        } else {
            $retorn = [
                "success" => false,
            ];
        }
        return response()->json($retorn);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showPicture($id)
    {
        $imagen = Imagen::findOrFail($id);
        $pic = Image::make($imagen->image);
        $response = Response::make($pic->encode('jpeg'));
        $response->header('Content-Type', 'image/jpeg');
        return $response;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showPictureNumber($id,$number)
    {
        $product=App\Product::findOrFail($id);
        $images=$product->images;
        $pic = Image::make($images[$number]->image);
        $response = Response::make($pic->encode('jpeg'));
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
        $inserted=false;
        DB::beginTransaction();
        try {

            $product = App\Product::findOrFail($id);
            if(count($product->images)>0){
                // $product->images()->detach(); detach is for belongstoMany
                // $product->images()->dissociate();
                foreach ($product->images as $item) {
                    $item->delete();//eliminamos las antiguas
                }
            }
            $product->delete();
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
                "success" => true,
            ];
        }
        return response()->json($retorn);
    }
}
