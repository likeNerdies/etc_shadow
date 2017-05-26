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
    private function products($user)
    {
        //products with allergies thats user has
        $productsWithUserAllergies = DB::table('ingredient_product')
            ->join('allergy_ingredient', 'ingredient_product.ingredient_id', '=', 'allergy_ingredient.ingredient_id')
            ->join('allergy_user', 'allergy_ingredient.allergy_id', '=', 'allergy_user.allergy_id')
            ->select('ingredient_product.product_id')
            ->where('allergy_user.user_id', '=', $user->id)
            ->distinct()
            ->get();
        $query = DB::table('products');
        foreach ($productsWithUserAllergies as $item) {
            $query->where('products.id', '<>', $item->product_id);
        }

        $ingProducts = App\Product::whereDoesntHave('ingredients', function ($query) use ($user) {
            foreach ($user->ingredients as $ing) {
                $query->where('ingredients.id', '!=', $ing->id);
            }
        })->get();
        foreach ($ingProducts as $item) {
            $query->where('products.id', '<>', $item->id);
        }

        return $query->get();
    }

    /**
     * @param $products
     * @param $plan
     * @param $dimension
     * @return App\Box
     */
    public function putProductIntoBox($products, $plan, $dimension)
    {
        $box = new App\Box;
        $box->save();
        $price = $plan->price;
        $sumaPrecioProductosCaja = 0;
        $lleno = false;
        for ($i = 0; $i < count($products) && !$lleno; $i++) {
            if (($sumaPrecioProductosCaja < $price * 1.1 && $sumaPrecioProductosCaja > $price * 0.85) || $sumaPrecioProductosCaja > $price)
                $lleno = true;

            if ($products[$i]->dimension <= $dimension) {
                $box->products()->attach([$products[$i]->id]);
                $sumaPrecioProductosCaja += $products[$i]->price;
            }

        }
        $box->save();
        return $box;
    }

    public function makeDelivery($user, $box)
    {
        $delivery = new App\Delivery;
        $delivery->save();
        $transporter = App\Transporter::find(rand(1, 3));
        $delivery->user()->associate($user);
        $delivery->transporter()->associate($transporter);
        $delivery->box()->associate($box);
        $delivery->save();
    }

    public function putDefaultProductBox(&$box){

        return $box;
    }
    /**
     * @return mixed
     */
    public function makeBox()
    {
        try {
            DB::beginTransaction();

            $usersWithPlan = App\User::has("plan")->get();
            foreach ($usersWithPlan as $user) {
                $products = $this->products($user);
                switch ($user->plan->id) {
                    case 1:
                        $box = $this->putProductIntoBox($products, $user->plan, 1);
                        break;
                    case 2:
                        $box = $this->putProductIntoBox($products, $user->plan, 2);
                        break;
                    case 3:
                        $box = $this->putProductIntoBox($products, $user->plan, 3);
                        break;
                }

                if(is_null($box) || empty($box) || count($products)==0 || is_null($products) || empty($products))
                    $this->putDefaultProductBox($box);

                $this->makeDelivery($user, $box);
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

    }


}
