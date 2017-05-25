<?php

namespace App\Http\Controllers\Box;
use App;
use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoxController extends Controller
{
    /**
     * Get all products with user allergies or user unliked ingredient product
     * @param $user
     * @return mixed
     */
    private function products($user){
        //products with allergies thats user has
        $productsWithUserAllergies=DB::table('ingredient_product')
            ->join('allergy_ingredient', 'ingredient_product.ingredient_id', '=', 'allergy_ingredient.ingredient_id')
            ->join('allergy_user', 'allergy_ingredient.allergy_id', '=', 'allergy_user.allergy_id')
            ->select('ingredient_product.product_id')
            ->where('allergy_user.user_id','=',$user->id)
            ->distinct()
            ->get();
        $query=DB::table('products');
        foreach ($productsWithUserAllergies as $item){
            $query->where('products.id','<>',$item->product_id);
        }

        $ingProducts = App\Product::whereDoesntHave('ingredients', function ($query) use ($user) {
            foreach ($user->ingredients as $ing){
                $query->where('ingredients.id', '!=', $ing->id);
            }
        })->get();
        foreach ($ingProducts as $item){
            $query->where('products.id','<>',$item->id);
        }

        return $query->get();
    }


    public  function makeBox(){

       $usersWithPlan=App\User::has("plan")->get();
        foreach ($usersWithPlan as $user) {

            switch ($user->plan->id){

                case 1:


                    break;
            }
       }
     $user=App\User::find(1701);
     $products=$this->products($user);

        $box=new App\Box;
        $box->save();
        foreach ($products as $product){
            $box->products()->attach([$product->id]);
        }
        $box->save();

        $delivery=new App\Delivery;
        $delivery->save();
        $transporter= App\Transporter::find(rand(1,3));
        $delivery->user()->associate($user);
        $delivery->transporter()->associate($transporter);
        $delivery->box()->associate($box);
        $delivery->save();


       //get all users with plan   ------------ok

        //por cada user..------------------ok
            //get user ingredient d------------------ok
            //get user allergies------------------ok

            //get products sin dichos ingredientes y allergies------------------ok

            //switch plan_id user

                //case 1



        //
        return $products;
    }


}
