<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
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
        $products=App\Product::paginate(9);
        //carpeta product, dentro products.blade.php (sera el index de productos)
        return view('product.products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadProduct $request)
    {
        DB::transaction(function ($request) {
            $product=App\Product::create($request->all());
            if($request->hasFile('photos')){//si existen fotos
                foreach ($request->photos as $photo) {//recorriendo todas las fotos
                    $path = Storage::putFile('public/product_images',$photo);//guardando fotos en el directorio storage/app/public/product_images
                   // $filename = $photo->store('photos');//guardando fotos
                    App\Image::create([
                        'path'=>$path,
                        'size'=>Storage::size($path),
                        'extension'=>pathinfo($path, PATHINFO_EXTENSION),
                        'product_id' => $product->id
                    ]);
                }
                $product->ingredients()->attach($request->ingredients);//guardando relacion con ingredientes y productos
            }
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
