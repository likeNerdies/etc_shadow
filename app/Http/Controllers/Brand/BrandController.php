<?php

namespace App\Http\Controllers\Brand;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use App\Http\Requests\Brand\StoreValidation;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand=App\Brand::paginate(9);
        return view('admin.brand.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Brand\StoreValidation  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand=App\Brand::create($request->all());
        return $brand;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand=App\Brand::all();
        return $brand;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Brand\StoreValidation  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand=App\Brand::find($id);
        $brand->name=$request->name;
        $brand->info=$request->brand;
        $brand->save();
        return $brand;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand=App\Brand::find($id);
        return $brand;
    }
}
