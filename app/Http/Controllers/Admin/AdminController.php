<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdatePersonalInfo;
use Auth;
use App;
use Hash;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function configuration()
    {
        return view('admin.configuration.index');
    }

    public function adminUsers()
    {
        $admins=App\Admin::all();
        return view('admin.configuration.create',compact('admins'));
    }

    /**
     * Update information of admin user
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
     * Update information of admin user
     * @param Request $request
     */
    public function updateAdminUser(UpdatePersonalInfo $request,$id)
    {
        $user = App\Admin::findOrFail($id);
        $user->dni = $request->dni;
        $user->name = $request->name;
        $user->first_surname = $request->first_surname;
        $user->second_surname = $request->second_surname;
        $user->email = $request->email;
        $user->password= Hash::make($request->password);
        $user->phone_number = $request->phone_number;
        $user->save();
        return $user;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin=App\Admin::findOrFail($id);
        return $admin;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $admin=App\Admin::findOrFail($id);
        $admin->delete();
        return $admin;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function store(Request $request){
        $request->password=Hash::make($request->password);
        $user=App\Admin::create($request->all());
        return $user;
    }

}
