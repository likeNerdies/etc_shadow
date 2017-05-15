<?php

namespace App\Http\Controllers\Transporter;
use App;
use App\Http\Requests\Transporter\StoreValidation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransporterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transporters = App\Transporter::paginate(9);
        return view('admin.transporter.index', compact('transporters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Transporter\StoreValidation  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreValidation $request)
    {
        //return response()->json(["tr"=>$request->name]);
        $transporter = App\Transporter::create($request->all());
        return $transporter;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transporter = App\Transporter::findOrFail($id);
        return $transporter;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Transporter\StoreValidation  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreValidation $request, $id)
    {
    //  return response()->json(["id"=>$request->name]);
        $transporter=App\Transporter::findOrFail($id);
        $transporter->name=$request->name;
        $transporter->cif=$request->cif;
        $transporter->phone_number=$request->phone_number;
        $transporter->save();
        return $transporter;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transporter=App\Transporter::findOrFail($id);
        $transporter->delete();
        return $transporter;
    }
}
