<?php

namespace App\Http\Controllers\Transporter;
use App;
use App\Http\Requests\Transporter\StoreValidation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class TransporterController
 * This Class controls the Transporter model
 * @package App\Http\Controllers\Transporter
 */
class TransporterController extends Controller
{
    /**
     * Returns the admin transporter view with pagintacion of 15 transporter object
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transporters = App\Transporter::paginate(15);
        return view('admin.transporter.index', compact('transporters'));
    }

    /**
     * Store a newly created transporter resource in storage.
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
     * Display the specified transporter resource.
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
     * Update the specified transporter resource in storage.
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
     * Remove the specified transporter resource from storage.
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
