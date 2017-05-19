<?php

namespace App\Http\Controllers\Box;
use App;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoxController extends Controller
{

    public static function makeBox(){

       $usersWithPlan=App\User::has("plan")->get();
        foreach ($usersWithPlan as $user) {
            switch ($user->plan()){

            }
       }
       //get all users with plan

        //por cada user..
            //get user ingredient d
            //get user allergies

            //get products sin dichos ingredientes y allergies

            //switch plan_id user

                //case 1



        //
        return $usersWithPlan;
    }
}
