<?php

namespace App\Http\Controllers\Plan;
use App;use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Plan\PlanValidation;

/**
 * Class PlanController
 * This class controll Plan model
 * @package App\Http\Controllers\Plan
 */
class PlanController extends Controller
{
    /**
     * Returns the admin plan view with paginate 15
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans=App\Plan::paginate(15);//pasamos todoos ls planes a la vista de admin
        return view ('admin.plan.index', compact('plans'));
    }


    /**
     * Returns the main plan view /plans with plans
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPlan()
    {
        $plans=App\Plan::paginate(9);//pasamos todoos ls planes a la main index plan
        return view ('plan.index', compact('plans'));
    }

    /**
     * Show's the specified plan and returns to the show view.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPlan($id){
        $plan = App\Plan::findOrFail($id);
        return view('plan.show',compact('plan'));
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plan.create');
    }

    /**
     * Store a newly created  plan resource in storage.
     *
     * @param  \App\Http\Requests\Plan\PlanValidation  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanValidation $request)
    {
        $retorn=["can_create"=>false];
        if(Auth::user()->can_create){
            $plan=App\Plan::create($request->all());
            $retorn=["can_create"=>true,"plan"=>$plan];
        }
        return response()->json($retorn);
    }

    /**
     * Display the specified plan resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = App\Plan::findOrFail($id);
        //carpeta plan, dentro show.blade.php
        //return view('plan.show', compact('plan'));
        return $plan;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        $plan = App\Plan::findOrFail($id);
        //carpeta plan, dentro edit.blade.php
        return view('plan.edit', compact('plan'));
    }*/

    /**
     * Update the specified resource plan in storage.
     *
     * @param  \App\Http\Requests\Plan\PlanValidation  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanValidation $request, $id)
    {
        $retorn=["can_create"=>false];
        if(Auth::user()->can_create) {
            $plan = App\Plan::findOrFail($id);
            $plan->name = $request->name;
            $plan->price = $request->price;
            $plan->info = $request->info;
            $plan->save();
            $retorn=["can_create"=>true,"plan"=>$plan];
        }
        return response()->json($retorn);
    }

    /**
     * Remove the specified plan resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $retorn=["can_create"=>false];
        if(Auth::user()->can_create) {
            $plan = App\Plan::findOrFail($id);
            $plan->delete();
            $retorn=["can_create"=>true];
        }
        return response()->json($retorn);
    }
}
