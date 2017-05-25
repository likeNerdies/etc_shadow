<?php

namespace App\Http\Controllers\Box;
use App;
use DB;
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

       //products with allergies thats user has
       $productsWithUserAllergies=DB::table('ingredient_product')
           ->join('allergy_ingredient', 'ingredient_product.ingredient_id', '=', 'allergy_ingredient.ingredient_id')
           ->join('allergy_user', 'allergy_ingredient.allergy_id', '=', 'allergy_user.allergy_id')
           ->join('products', 'ingredient_product.product_id', '=', 'products.id')
           ->select('products.*')
           ->where('allergy_user.user_id','=',1701)
           ->distinct();




       //get all users with plan

        //por cada user..
            //get user ingredient d
            //get user allergies

            //get products sin dichos ingredientes y allergies

            //switch plan_id user

                //case 1



        //
        return $productsWithUserAllergies;
    }
}
