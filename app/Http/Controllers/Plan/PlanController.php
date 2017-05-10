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
        $plans=App\Plan::all();//pasamos todoos ls planes a la vista plan/index.blade.php
        return view ('plan.index',compact('plans'));
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
        return redirect('plan.index');
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
        return view('plan.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = App\Plan::findOrFail($id);
        //carpeta plan, dentro edit.blade.php
        return view('plan.edit', compact('plan'));
    }

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
        $plan->save();
        return redirect('plan.index');
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
        return redirect('/');
    }
}
