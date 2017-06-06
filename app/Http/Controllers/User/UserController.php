<?php

namespace App\Http\Controllers\User;

use DB;
use Auth;
use Hash;
use Session;
use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdatePersonalInfo;
use App\Http\Requests\User\UpdatePersonalInfoUser;

class UserController extends Controller
{
    /**
     * You need to be authed to make change in db with this controller
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Returns the user panel profile view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = Auth::user();
        $deliveries = DB::table('deliveries')->where('user_id', '=', $id)->orderBy('created_at', 'dsc')->get();
        $boxes = [];
        for ($index = 0; $index < count($deliveries); $index++) {
            $delivery = App\Delivery::find($deliveries[$index]->id);
            $boxes[$index] = [
                "products" => $delivery->box->products,
                "from" => _t($delivery->created_at->diffForHumans(), [], Session::get('locale'))
            ];
        }
        $plans = App\Plan::all();
        return view('user.panel.profile.index', compact(["user", "boxes", "plans"]));
    }

    /**
     * Returns the user panel data view
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        return view('user.panel.data.index');
    }

    /**
     * Current user loged update
     * @param Request $request
     */
    public function update(UpdatePersonalInfo $request)
    {
        $retorn = [];
        try {
            $user = Auth::user();
            $user->dni = $request->dni;
            $user->name = $request->name;
            $user->first_surname = $request->first_surname;
            $user->second_surname = $request->second_surname;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->save();
            $retorn = ["success" => true];
        } catch (Exception $e) {
            $retorn = ["success" => false];
        }

        return response()->json($retorn);

    }

    /**
     * Current user loged password change
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePassword(Request $request)
    {

        //   return response()->json(['antiguo'=>Hash::make($request->old_password),'pass'=>$user->password]);
        $this->validate($request, [
            'old_password' => 'required|min:8',
            'password' => 'required|min:8|confirmed',
        ]);
        $retorn = ["success" => false];
        $user = Auth::user();
        if (password_verify($request->old_password, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
            $retorn = ["success" => true];
        }
        return response()->json($retorn);
    }

    /**
     * Remove the specified  user resource from storage.
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

    /**
     * Returns the destro user menu view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroymenu()
    {
        return view('user.panel.destroy-user');
    }

    /**
     * Returns the help view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function help()
    {
        return view('help.index');
    }

    /**
     * Returns the ingredient user view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function unlikeIngredientShow()
    {
        $ingredients = App\Ingredient::all();
        return view('user.panel.ingredient.index', compact('ingredients'));
    }

    /**
     * Método que controla el like de un ingrediente  usuario
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function likeIngredientStore(Request $request)
    {
        $user = Auth::user();
        $retorn = [];
        $exists = false;
        $ingredients = $user->ingredients;
        for ($i = 0; $i < count($ingredients); $i++) {
            if ($ingredients[$i]->id == $request->ingredient_id) {
                $exists = true;
            }
        }
        if ($exists) {
            $user->ingredients()->detach([$request->ingredient_id]);
            $user->save();
            $retorn = ['success' => true];
        } else {
            $retorn = ['success' => false];
        }

        return response()->json($retorn);
    }

    /**
     * Método que controla el unlike de un ingrediente  usuario
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function unlikeIngredientStore(Request $request)
    {
        $user = Auth::user();
        $retorn = [];
        $exists = false;
        $ingredients = $user->ingredients;
        if (count($ingredients) > 0 || $ingredients != null)
            for ($i = 0; $i < count($ingredients); $i++) {
                if ($ingredients[$i]->id == $request->ingredient_id) {
                    $exists = true;
                }
            }
        if (!$exists) {
            $user->ingredients()->attach([$request->ingredient_id]);
            $user->save();
            $retorn = ['success' => true];
        } else {
            $retorn = ['success' => false];
        }
        return response()->json($retorn);

    }

    /**
     * Returns the allergy user view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userAllergyShow()
    {
        $allergies = App\Allergy::all();
        return view('user.panel.allergy.index', compact('allergies'));
    }

    /**
     * Método que controla y añade el allergy para  usuario
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userAllergyStore(Request $request)
    {
        $user = Auth::user();
        $retorn = [];
        $exists = false;
        $allergies = $user->allergies;
        if (count($allergies) > 0 || $allergies != null)
            for ($i = 0; $i < count($allergies); $i++) {
                if ($allergies[$i]->id == $request->allergy_id) {
                    $exists = true;
                }
            }
        if (!$exists) {
            $user->allergies()->attach([$request->allergy_id]);
            $user->save();
            $retorn = ['success' => true];
        } else {
            $retorn = ['success' => false];
        }

        return response()->json($retorn);
    }

    /**
     * Método que controla y quita el allergy para  usuario
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userHasntAllergyStore(Request $request)
    {
        $user = Auth::user();
        $retorn = [];
        $exists = false;
        $allergies = $user->allergies;
        if (count($allergies) > 0 || $allergies != null)
            for ($i = 0; $i < count($allergies); $i++) {
                if ($allergies[$i]->id == $request->allergy_id) {
                    $exists = true;
                }
            }
        if ($exists) {
            $user->allergies()->detach([$request->allergy_id]);
            $user->save();
            $retorn = ['success' => true];
        } else {
            $retorn = ['success' => false];
        }

        return response()->json($retorn);
    }

    /**
     * Returns use plan view
     *
     * @return \Illuminate\Http\Response
     */
    public function plan()
    {
        $plans = App\Plan::all();
        return view('user.panel.plan.index', compact('plans'));
    }

    /**
     * user subsrcibing to plan
     * @param Request $request
     */
    public function subscribeToPlan(Request $request)
    {
        $this->validate($request, [
            "plan_id" => array(
                'required',
                'regex:/[123]{1}/'
            ),
        ]);
        $retorn = ["succeed" => false];

        try {
            $user = Auth::user();
            if ($user->address != null) {
                $plan = App\Plan::findOrFail($request->plan_id);
                $user->plan()->associate($plan);
                $user->subscribed_at = date("Y-m-d");
                $user->save();

                if (Session::get('locale') == 'es') {
                    $retorn = [
                        "succeed" => true,
                        "mensaje1" => "Bien Hecho!",
                        "mensaje2" => "Ya estás suscrito en el plan"
                    ];
                } else {
                    $retorn = [
                        "succeed" => true,
                        "mensaje1" => "Well done!",
                        "mensaje2" => "You are already subscribed to the plan"
                    ];
                }
            }
        } catch (Exception $e) {

        }

        return response()->json($retorn);
    }

    /**
     * user cancel subscription
     * @param Request $request
     */
    public function cancelSubscription(Request $request)
    {
        $retorn = ["success" => false];
        $user = Auth::user();
        //  $plan = App\Plan::findOrFail($request->plan_id);
        //  $user->plan()->associate($plan);
        if (isset($user->plan)) {
            $user->plan()->dissociate();
            $retorn = ["success" => true];
            $user->subscribed_at = null;
            $user->save();
        }
        return response()->json($retorn);
    }

    /**
     * Returns the user plan subscribe view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subscribeForm($id)
    {
        $plan = null;

        if ($id >= 1 && $id <= 3) {
            $plan = App\Plan::find($id);
            return view('user.panel.plan.subscribe', compact('plan'));
        } else {
            return view('errors.404');
        }

    }


    ////////////////////////for admin panel

    /**
     * Returns the admin user (client) view with pagination
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $clients = App\User::paginate(15);
        return view('admin.client.index', compact("clients"));
    }

    /**
     * Returns a specified user json format
     * @param $id
     * @return array
     */
    public function adminShow($id)
    {
        $client = App\User::findOrFail($id);
        $plans = App\Plan::all();
        $retorn = [
            "client" => $client,
            "plan" => $client->plan,
            "plans" => $plans
        ];
        return $retorn;
    }

    /**
     * Remove the specified admin resource from storage.
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

    /**
     * Method for update user from admin panel
     * @param Request $request
     */
    public function adminUpdate(UpdatePersonalInfoUser $request, $id)
    {
        // return response()->json(["plan---------"=>$request->plan]);
        $client = App\User::findOrFail($id);
        $client->dni = $request->dni;
        $client->name = $request->name;
        $client->first_surname = $request->first_surname;
        $client->second_surname = $request->second_surname;
        $client->email = $request->email;
        $client->phone_number = $request->phone_number;
        if (isset($request->password)) {
            $client->password = bcrypt($request->password);
        }
        if (isset($request->plan)) {
            $client->plan()->associate($request->plan);
            $client->subscribed_at = date("Y-m-d");
        } else {
            $client->plan()->dissociate();
        }
        $client->save();
        $retorn = [
            "client" => $client,
            "plan" => $client->plan
        ];
        return $retorn;
    }


}
