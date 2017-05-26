<?php

namespace App\Http\Controllers\Plan;
use App;use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Plan\PlanValidation;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans=App\Plan::paginate(9);//pasamos todoos ls planes a la vista de admin
        return view ('admin.plan.index', compact('plans'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPlan()
    {
        $plans=App\Plan::paginate(9);//pasamos todoos ls planes a la main index plan
        return view ('plan.index', compact('plans'));
    }

    public function showPlan($id){
        $plan = App\Plan::findOrFail($id);
        return view('plan.show',compact('plan'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Plan\PlanValidation  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanValidation $request)
    {
        $plan=App\Plan::create($request->all());
        return $plan;
    }

    /**
     * Display the specified resource.
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
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Plan\PlanValidation  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanValidation $request, $id)
    {
        $plan=App\Plan::findOrFail($id);
        $plan->name=$request->name;
        $plan->price=$request->price;
        $plan->info=$request->info;
        $plan->save();
        //return redirect('plan.index');
        return $plan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = App\Plan::findOrFail($id);
        $plan->delete();
        //return redirect('/');
        return $plan;
    }
}
