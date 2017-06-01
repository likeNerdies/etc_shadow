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
        $query->where('stock','>',0);
        return $query->get();
    }

    /**
     * Create's a new Box model object and puts Products object into the box until it filled
     * @param $products array of products
     * @param $plan the plan
     * @param $dimension the dimension of the products and box
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

            if ($products[$i]->dimension <= $dimension && $products[$i]->stock>0) {
                $box->products()->attach([$products[$i]->id]);
                $prod=App\Product::find($products[$i]->id);
                $prod->stock=$prod->stock-1;
                $prod->save();
                $sumaPrecioProductosCaja += $products[$i]->price;
            }

        }
        $box->save();
        return $box;
    }

    /**
     * makes a delivery object with user,box and transporter
     * @param $user
     * @param $box
     */
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

    /**
     * Put products in box per default without logic
     * @param $box
     * @return mixed
     */
    public function putDefaultProductBox(&$box){

        return $box;
    }
    /**
     * Algoritmo que inicia una transaccion en db, busca todos lo usuarios con plan, por cada user con plan
     * recoge su pla, por cada plan introduce products en su caja respetivo. En el caso de que reciba un box sin products
     * se llena con productos por defecto.
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

    /**
     * Returns the admin box view with some datas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $boxes=DB::table('boxes')->select("id" ,DB::raw("(COUNT(*)) as total_click"))
            ->orderBy('created_at')
            ->groupBy(DB::raw("YEAR(created_at), MONTH(created_at)"))
            ->get();
        return view('admin.box.index',compact('boxes'));
    }
    public function boxPerMotnhCount(){
        return[
          "1"=>App\Box::all(),
        ];
    }
}
