<?php

namespace App\Http\Controllers\Allergy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use App\Http\Requests\Allergy\StoreValidation;

/**
 * Class AllergyController
 * This Class controls the Allergy Model
 * @package App\Http\Controllers\Allergy
 */
class AllergyController extends Controller
{
    /**
     * Returns a pagination of 15 allergies to the admin allergy view
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allergies=App\Allergy::paginate(15);
        return view('admin.allergy.index',compact('allergies'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\Allergy\StoreValidation $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreValidation $request)
    {
        $allergy=App\Allergy::create($request->all());
        return $allergy;
    }

    /**
     *  Show the specified resource by id in Allergy Model
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allergy=App\Allergy::findOrFail($id);
        return $allergy;
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Http\Requests\Allergy\StoreValidation  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreValidation $request, $id)
    {
        $allergy=App\Allergy::findOrFail($id);
        $allergy->name=$request->name;
        $allergy->save();
        return $allergy;
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $allergy=App\Allergy::findOrFail($id);
        $allergy->delete();
        return $allergy;
    }
}
