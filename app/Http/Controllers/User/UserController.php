<?php

namespace App\Http\Controllers\User;

use Auth;
use Hash;
use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdatePersonalInfo;
use App\Http\Requests\User\UpdatePersonalInfoUser;

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

        return view('user.panel.profile.index', compact("user"));
    }

    /**
     * Show the form for editing user info
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        return view('user.panel.data.index');
    }

    /**
     * @param Request $request
     */
    public function update(UpdatePersonalInfo $request)
    {
        $retorn=[];
        try{
            $user = Auth::user();
            $user->dni = $request->dni;
            $user->name = $request->name;
            $user->first_surname = $request->first_surname;
            $user->second_surname = $request->second_surname;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->save();
            $retorn=["success"=>true];
        }catch(Exception $e){
            $retorn=["success"=>false];
        }

        return response()->json($retorn);

    }

    public function updatePassword(Request $request){

     //   return response()->json(['antiguo'=>Hash::make($request->old_password),'pass'=>$user->password]);
        $this->validate($request, [
            'old_password'=>'required|min:8',
            'password' => 'required|min:8|confirmed',
        ]);
        $retorn=["success"=>false];
        $user=Auth::user();
        if(password_verify($request->old_password,$user->password)){
           $user->password=bcrypt($request->password);
           $user->save();
            $retorn=["success"=>true];
        }
        return response()->json($retorn);
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


    public function help()
    {
        return view('help.index');
    }


    public function unlikeIngredientShow(){
        $ingredients=App\Ingredient::all();
        return view('user.panel.ingredient.index',compact('ingredients'));
    }

    public function likeIngredientStore(Request $request){
        $user = Auth::user();
        $retorn =[];
        $exists=false;
        $ingredients=$user->ingredients;
        for($i=0;$i<count($ingredients);$i++){
            if($ingredients[$i]->id==$request->ingredient_id){
                $exists=true;
            }
        }
        if($exists){
            $user->ingredients()->detach([$request->ingredient_id]);
            $user->save();
            $retorn=['success'=>true];
        }else{
            $retorn=['success'=>false];
        }

        return response()->json($retorn);
    }

    public function unlikeIngredientStore(Request $request){
        $user = Auth::user();
        $retorn =[];
        $exists=false;
        $ingredients=$user->ingredients;
        if(count($ingredients)>0 || $ingredients!=null)
        for($i=0;$i<count($ingredients);$i++){
            if($ingredients[$i]->id==$request->ingredient_id){
                $exists=true;
            }
        }
        if(!$exists){
            $user->ingredients()->attach([$request->ingredient_id]);
            $user->save();
            $retorn=['success'=>true];
        }else{
            $retorn=['success'=>false];
        }
        return response()->json($retorn);

    }

    public function userAllergyShow(){
        $allergies = App\Allergy::all();
        return view('user.panel.allergy.index',compact('allergies'));
    }

    public function userAllergyStore(Request $request){
        $user = Auth::user();
        $retorn =[];
        $exists=false;
        $allergies=$user->allergies;
        if(count($allergies)>0 || $allergies!=null)
            for($i=0;$i<count($allergies);$i++){
                if($allergies[$i]->id==$request->allergy_id){
                    $exists=true;
                }
            }
        if(!$exists){
            $user->allergies()->attach([$request->allergy_id]);
            $user->save();
            $retorn=['success'=>true];
        }else{
            $retorn=['success'=>false];
        }

        return response()->json($retorn);
    }

    public function userHasntAllergyStore(Request $request){
        $user = Auth::user();
        $retorn =[];
        $exists=false;
        $allergies=$user->allergies;
        if(count($allergies)>0 || $allergies!=null)
            for($i=0;$i<count($allergies);$i++){
                if($allergies[$i]->id==$request->allergy_id){
                    $exists=true;
                }
            }
        if($exists){
            $user->allergies()->detach([$request->allergy_id]);
            $user->save();
            $retorn=['success'=>true];
        }else{
            $retorn=['success'=>false];
        }

        return response()->json($retorn);
    }

    /**
     * Show the form for editing user info
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
        $user = Auth::user();
        $plan = App\Plan::findOrFail($request->plan_id);
        $user->plan()->associate($plan);
        $user->subscribed_at = date("Y-m-d");
        $user->save();
        return response()->back();
    }

    /**
     * user subsrcibing to plan
     * @param Request $request
     */
    public function cancelSubscription(Request $request)
    {
        $user = Auth::user();
        $plan = App\Plan::findOrFail($request->plan_id);
        $user->plan()->associate($plan);
        if (isset($user->plan)) {
            $user->plan()->dissociate();
        }
        $user->subscribed_at = null;
        $user->save();
        return response()->back();
    }

    public function subscribeForm(){
        return view('user.plan.subscribe');
    }


    ////////////////////////for admin panel

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $clients = App\User::paginate(15);
        return view('admin.client.index', compact("clients"));
    }

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

    /**
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
