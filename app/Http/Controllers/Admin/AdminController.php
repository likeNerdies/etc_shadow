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

/**
 * Class AdminController
 * This Class controls de Admin Model
 * @package App\Http\Controllers\Admin
 */
class AdminController extends Controller
{
    /**
     * Needs to be authed as admin to make changes with this controller
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Returns some data to admin dashboard.
     * Data's: Total users, total box to send , total profit of the next motnh,products about to expire,
     * las user registered
     * Display the index page admin/dashboard.
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
                    $charming=App\Plan::find(1);
                    $pro =App\Plan::find(2);
                    $premium =App\Plan::find(3);

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
                        "charming"=>$charming->price*$usersCharming,
                        "pro"=>$pro->price*$usersPro,
                        "premium"=>$premium->price*$usersPremium,
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

    /**
     * Display the view of admin configuration
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function configuration()
    {
        return view('admin.configuration.index');
    }

    /**
     * Display the view of admin/user passing all admin to the view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminUsers()
    {
        $admins = App\Admin::all();
        return view('admin.configuration.create', compact('admins'));
    }

    /**
     * Update information of own admin user
     * @param Request $request
     */
    public function update(StoreValidation $request)
    {
        $retorn=["success"=>true];
       try{
           $user = Auth::user();
           $user->dni = $request->dni;
           $user->name = $request->name;
           $user->first_surname = $request->first_surname;
           $user->second_surname = $request->second_surname;
           $user->email = $request->email;
           $user->phone_number = $request->phone_number;
           $user->save();
       }catch(Exception $e){
           $retorn=["success"=>false];
       }


        return response()->json($retorn);

    }

    /**
     * Update information of other admin users
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
     * Display the specified admin resource.
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
     * Delete the specified admin resource.
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
     * Store a new admin in the database
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
