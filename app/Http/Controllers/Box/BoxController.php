<?php

namespace App\Http\Controllers\Box;
use App;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoxController extends Controller
{

    public static function makeBox(){
       /* $usersWithPlan=[];
        $usersWithPlan[0]=App\User::whereHas('plan', function ($query) {
            $query->where('id', '=', 1);
        })->get();

        $usersWithPlan[1]=App\User::whereHas('plan', function ($query) {
            $query->where('id', '=', 2);
        })->get();

        $usersWithPlan[2]=App\User::whereHas('plan', function ($query) {
            $query->where('id', '=', 3);
        })->get();*/
       $usersWithPlan=App\User::has("plan")->get();

        foreach ($usersWithPlan as $user) {
            switch ($user->plan()){

            }
       }
       //get all users with plan

        //por cada user..
            //get user ingredient
            //get user allergies

            //get products sin dichos ingredientes y allergies

            //switch plan_id user


        //
        return $usersWithPlan;
    }
}
