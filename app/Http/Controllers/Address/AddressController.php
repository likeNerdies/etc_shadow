<?php

namespace App\Http\Controllers\Address;
use App;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Address\AddressFormValidation;

/**
 * Class AddressController
 * This class control Address model
 * @package App\Http\Controllers\Address
 */
class AddressController extends Controller
{
    /**
     * Needs to be authed to make change with the controller
     * AddressController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the index page of address in user/panel
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.panel.address.address');
    }


    /**
     * Method for store an Address in database. The request is validated by AddressFormValidation Class.
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
     * Method for update an Address in database. The request is validated by AddressFormValidation Class.
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
