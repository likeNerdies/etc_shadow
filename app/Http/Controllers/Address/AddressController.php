<?php

namespace App\Http\Controllers\Address;
use App;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Address\AddressFormValidation;
class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.panel.address.address');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function insertUserAddress(AddressFormValidation $request){

        $address= new App\Address;
        $address->street=$request->street;
        $address->building_number=$request->building_number;
        $address->building_block=$request->building_block;
        $address->floor=$request->floor;
        $address->door=$request->door;
        $address->postal_code=$request->postal_code;
        $address->town=$request->town;
        $address->province=$request->province;
        $address->country=$request->country;
        $address->save();
        $user=Auth::user();
        $user->address_id=$address->id;//associate modificar en un futuro
        $user->save();
        return redirect()->back();

    }
    public function updateUserAddress(AddressFormValidation $request){
        $address= App\Address::findOrFail($request->id);
        $address->street=$request->street;
        $address->building_number=$request->building_number;
        $address->building_block=$request->building_block;
        $address->floor=$request->floor;
        $address->door=$request->door;
        $address->postal_code=$request->postal_code;
        $address->town=$request->town;
        $address->province=$request->province;
        $address->country=$request->country;
        $address->save();
        return redirect()->back();

    }
}
