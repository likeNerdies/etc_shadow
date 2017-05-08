<?php

namespace App\Http\Controllers\User;
use Auth;
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
        return view('user.panel.profile');
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
    public function update(UpdatePersonalInfo $request){
        $user=Auth::user();
        $user->dni=$request->dni;
        $user->name=$request->name;
        $user->first_surname=$request->first_surname;
        $user->second_surname=$request->second_surname;
        $user->email=$request->email;
        $user->phone_number=$request->phone_number;
        $user->save();
        return redirect()->back();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user=Auth::user();
        $user->delete();
        return redirect('/');
    }
    public function destroymenu(){
        return view('user.panel.destroy-user');
    }
}
