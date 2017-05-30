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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param AddressFormValidation $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddressFormValidation $request){
        $retorn=["success"=>true];
        try{
            $address= App\Address::create($request->all());
            $user=Auth::user();
            $address->user()->associate($user);
            $address->save();
            $user->save();
        }catch(Exception $e){
            $retorn=["success"=>false];
        }

        return response()->json($retorn);

    }

    /**
     * @param AddressFormValidation $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AddressFormValidation $request){
        $retorn=["success"=>true];
        try{
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
        }catch(Exception $e){
            $retorn=["success"=>false];
        }

        return response()->json($retorn);

    }
}
