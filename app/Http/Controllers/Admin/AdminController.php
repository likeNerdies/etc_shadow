<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdatePersonalInfo;
use App\Http\Requests\Admin\StoreValidation;
use App\Http\Requests\Admin\AdminUpdateValidation;
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
        //return date("m");
        $totalUsers = App\User::all()->count();
        $boxToSend = App\User::has('plan')->get()->count();


        $profit = [];
               try{
                    //calculando total ganancias
                    $charming=App\Plan::find(1)->value('price');
                    $pro =App\Plan::find(1)->value('price');
                    $premium =App\Plan::find(1)->value('price');

                    $usersCharming=App\User::whereHas('plan', function ($query) {
                        $query->where('id', '=', 1);
                    })->get()->count();

                    $usersPro=App\User::whereHas('plan', function ($query) {
                        $query->where('id', '=', 2);
                    })->get()->count();

                    $usersPremium=App\User::whereHas('plan', function ($query) {
                        $query->where('id', '=', 3);
                    })->get()->count();
                    $profit=[
                        "charming"=>$charming*$usersCharming,
                        "pro"=>$pro*$usersPro,
                        "premium"=>$premium*$usersPremium,
                    ];
                }catch(Exception $e){
                    $profit=[
                        "charming"=>0,
                        "pro"=>0,
                        "premium"=>0,
                    ];
                }
        /*$boxes = App\Box::all();
        foreach ($boxes as $box) {

        }*/

        //products order by expiration date
        $productOBED = App\Product::orderBY('expiration_date', 'asc')->paginate(5);

        //last 5 users registered
        $lastFiveUsers = App\User::orderBy('created_at', 'dsc')->limit(5)->get();

        //--end calculando total ganancias


        return view('admin.index', compact(['totalUsers', 'boxToSend', 'profit', 'productOBED', 'lastFiveUsers']));
    }

    public function configuration()
    {
        return view('admin.configuration.index');
    }

    public function adminUsers()
    {
        $admins = App\Admin::all();
        return view('admin.configuration.create', compact('admins'));
    }

    /**
     * Update information of admin user
     * @param Request $request
     */
    public function update(StoreValidation $request)
    {
        // return "hola";
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

    /**Update information of admin user
     * @param AdminUpdateValidation $request
     * @param $id
     * @return mixed
     */
    public function updateAdminUser(AdminUpdateValidation $request, $id)
    {
        $user = App\Admin::findOrFail($id);
        $user->dni = $request->dni;
        $user->name = $request->name;
        $user->first_surname = $request->first_surname;
        $user->second_surname = $request->second_surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone_number = $request->phone_number;
        $user->can_create = $request->can_create;
        $user->save();
        return $user;

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = App\Admin::findOrFail($id);
        return $admin;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $admin = App\Admin::findOrFail($id);
        $admin->delete();
        return $admin;
    }

    /**
     * @param StoreValidation $request
     * @return mixed
     */
    public function store(StoreValidation $request)
    {
        $user = App\Admin::create([
            'dni' => $request->dni,
            'name' => $request->name,
            'first_surname' => $request->first_surname,
            'second_surname' => $request->second_surname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number,
            'can_create' => $request->can_create
        ]);
        return $user;
    }

}
