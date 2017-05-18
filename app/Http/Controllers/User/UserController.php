<?php

namespace App\Http\Controllers\User;

use Auth;
use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdatePersonalInfo;

class UserController extends Controller
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
        $user = Auth::user();
        return view('user.panel.profile', compact("user"));
    }

    /**
     * Show the form for editing user info
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        return view('user.panel.data');
    }

    /**
     * @param Request $request
     */
    public function update(UpdatePersonalInfo $request)
    {
        $user = Auth::user();
        $user->dni = $request->dni;
        $user->name = $request->name;
        $user->first_surname = $request->first_surname;
        $user->second_surname = $request->second_surname;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save();
        return redirect()->back();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        return redirect('/');
    }

    public function destroymenu()
    {
        return view('user.panel.destroy-user');
    }

    /**
     * user subsrcibing to plan
     * @param Request $request
     */
    public function subscribeToPlan(Request $request)
    {
        //simple for now
        //añadir transaction con pago visa
        //comprobar si ya tiene plan
        //si no paga un mes, se quita la subscripcion
        $user = Auth::user();
        //$user->plan_id=$request->plan_id;
        $plan = App\Plan::findOrFail($request->plan_id);
        $user->plan()->associate($plan);
        $user->save();
    }



    ////////////////////////for admin panel

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $clients = App\User::all();
        return view('admin.client.index', compact("clients"));
    }

    public function adminShow($id)
    {
        $client = App\User::findOrFailc($id);
        $plans = App\Plan::all();
        $retorn = [
            "client" => $client,
            "plan" => $client->plan,
            "plans" => $plans
        ];
        return $retorn;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function adminDelete($id)
    {
        $user = App\User::findOrFail($id);
        $user->delete();
         return $user;
    }

}
