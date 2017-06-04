<?php

namespace App\Http\Controllers\Product;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UploadProduct;
use App;
use Mockery\Exception;
use App\Http\Requests\Ingredient\StoreImage;
use DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Image as Imagen;
use App\Http\Requests\Image\ImageValidation;
use File;

class ProductController extends Controller
{
    /**
     * Returns admin product view with products and brands
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = App\Product::paginate(15);
        $brands = App\Brand::all();
        return view('admin.product.index', compact(['products', 'brands']));
    }

    /**
     * Returns the main product view .app/products  with products paginate 15 , also the categories and brands.
     *
     * @return \Illuminate\Http\Response
     */
    public function productsIndex()
    {
        $products = App\Product::orderBy('created_at', 'desc')->paginate(15);
        $categories = App\Category::all();
        $brands = App\Brand::all();
        return view('product.index', compact(['products', 'brands', 'categories']));
    }

    /**
     * Show the specified product for main index .app/products
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
     * Store a newly created product resource in storage.
     * Return json with the product,ingredients,categories,brand images of the prodcut
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
     * Primero se empieza borrando todas las imagenes.
     * Siempre se guardara 3 imagenes. Si el usuario solo envia 1, las otras dos imagenes se
     * rellenaran con una foto por defecto.
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeImage(ImageValidation $request, $id)
    {

        /*  $this->validate($request, [
              'image.0' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
              'image.1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
              'image.2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000'
          ]);*/
        $inserted = true;
        try {
            DB::beginTransaction();
            if ($request->hasFile('image')) {//si existen fotos
                $product = App\Product::findOrFail($id);
                //deleting all images
                if (count($product->images) > 0) {
                    // $product->images()->detach(); detach is for belongstoMany
                    // $product->images()->dissociate();
                    foreach ($product->images as $item) {
                        $item->delete();//eliminamos las antiguas
                    }
                }
                if (isset(Input::file('image')[0])) {
                    if (File::exists(Input::file('image')[0])) {
                        $img = Image::make(Input::file('image')[0]);
                        Response::make($img->encode('jpeg'));
                        App\Image::create([
                            'image' => $img,
                            'product_id' => $product->id
                        ]);
                    }
                } else {
                    //  $img = Image::make(asset('/img/user_products/no_image_available.png'));
                    $img = Image::make(Storage::disk('local')->get('no_image_available.png'));
                    Response::make($img->encode('jpeg'));
                    App\Image::create([
                        'image' => $img,
                        'product_id' => $product->id
                    ]);
                }


                if (isset(Input::file('image')[1])) {
                    if (File::exists(Input::file('image')[1])) {
                        $img = Image::make(Input::file('image')[1]);
                        Response::make($img->encode('jpeg'));
                        App\Image::create([
                            'image' => $img,
                            'product_id' => $product->id
                        ]);
                    }
                } else {
                    //$img = Image::make(asset('/img/user_products/no_image_available.png'));
                    $img = Image::make(Storage::disk('local')->get('no_image_available.png'));
                    Response::make($img->encode('jpeg'));
                    App\Image::create([
                        'image' => $img,
                        'product_id' => $product->id
                    ]);
                }

                if (isset(Input::file('image')[2])) {
                    if (File::exists(Input::file('image')[2])) {
                        $img = Image::make(Input::file('image')[2]);
                        Response::make($img->encode('jpeg'));
                        App\Image::create([
                            'image' => $img,
                            'product_id' => $product->id
                        ]);
                    }
                } else {
                    //$img = Image::make(asset('/img/user_products/no_image_available.png'));
                    $img = Image::make(Storage::disk('local')->get('no_image_available.png'));
                    Response::make($img->encode('jpeg'));
                    App\Image::create([
                        'image' => $img,
                        'product_id' => $product->id
                    ]);
                }


                /*   if(File::exists(isset(Input::file('image')[1]))){
                       $img = Image::make(Input::file('image')[0]);
                       Response::make($img->encode('jpeg'));
                       App\Image::create([
                           'image' => $img,
                           'product_id' => $product->id
                       ]);
                   }
                   if(File::exists(isset(Input::file('image')[2]))){
                       $img = Image::make(Input::file('image')[0]);
                       Response::make($img->encode('jpeg'));
                       App\Image::create([
                           'image' => $img,
                           'product_id' => $product->id
                       ]);
                   }*/
                /*  //adding new images
                  foreach (Input::file('image') as $photo) {//recorriendo todas las fotos
                      $img = Image::make($photo);
                      Response::make($img->encode('jpeg'));
                      App\Image::create([
                          'image' => $img,
                          'product_id' => $product->id
                      ]);
                  }*/
                $product->save();
            }
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
     * Returns the specified image
     * @param $id id of image
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
     * Returns the number of image of the specified product
     * @param $id id of product
     * @return mixed
     */
    public function showPictureNumber($id, $number)
    {
        $product = App\Product::findOrFail($id);
        $images = $product->images;
        $pic = Image::make($images[$number]->image);
        $response = Response::make($pic->encode('jpeg'));
        $response->header('Content-Type', 'image/jpeg');
        return $response;
    }

    /**
     * Returns a json with al info about the specified product
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
     * Update the specified product resource in storage.
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
     * Remove the specified product resource from storage.
     * Also delete's the images of product
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inserted = false;
        DB::beginTransaction();
        try {

            $product = App\Product::findOrFail($id);
            if (count($product->images) > 0) {
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

    /**
     * Búsqueda dinámica. Recibe parametros especificos y monta una query dinámica de la bd con esos parametros.
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function dynamicQuery(Request $request)
    {

      /*  $query = App\Product::with('images'); //names of eager loaded relationships
        if (isset($request->brands)) {
            $query->whereIn('brand_id', $request->brands);
        }

        if (isset($request->categories)) {
            $query->leftJoin('category_product', 'products.id', '=', 'category_product.product_id');
           // $query->join('products', 'category_product.product_id', '=', 'products.id');
            //$query->join('categories', 'category_product.category_id', '=', 'categories.id');
            $query->whereIn('category_id', $request->categories);
        }

        if (isset($request->organic)) {
            $query->where('organic', '=', 1);
        }
        if (isset($request->vegetarian)) {
            $query->where('vegetarian', '=', 1);
        }
        if (isset($request->vegan)) {
            $query->where('vegan', '=', 1);
        }
        //  $query->where('categories','=','bebida');
        return $query->get();
        /*  $products = DB::table('products')
              ->join('category_product', 'products.id', '=', 'category_product.product_id')
              ->select('*')
              ->whereIn('brand_id',[1,3])
              ->whereIn('category_id',[1,2])
              ->where('vegetarian','=',1)
              ->get();
          return $products;*/

        $products = DB::table('products');
        if (isset($request->categories)) {
            $categories=$request->categories;
            $products = App\Product::whereHas('categories', function ($query) use($categories){
               // foreach ($categories as $category){
                    //$query->where('categories.id','=', $category);
                    $query->whereIn('categories.id', $categories);
               // }
            });
        }
        if (isset($request->brands)) {
            $products->whereIn('brand_id', $request->brands);
        }

        if (isset($request->organic)) {
            $products->where('organic', '=', 1);
        }
        if (isset($request->vegetarian)) {
            $products->where('vegetarian', '=', 1);
        }
        if (isset($request->vegan)) {
            $products->where('vegan', '=', 1);
        }


        return $products->get();
    }
}
