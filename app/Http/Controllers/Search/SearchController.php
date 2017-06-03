<?php

namespace App\Http\Controllers\Search;
use App\User;
use App\Allergy;
use App\Category;
use App\Brand;
use App\Ingredient;
use App\Product;
use App\Plan;
use App\Admin;
use App\Transporter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App;
use DB;
use Storage;
use Auth;

/**
 * Class SearchController
 * Searchable Class
 * @package App\Http\Controllers\Search
 */
class SearchController extends Controller
{
    /**
     * busqueda ajax para Users.
     * Devuelve usuarios con id o name que coicida con los parametros
     * @param Request $request
     */
    public function client(Request $request, User $user)
    {
        $retorn = [];
        if ($request->ajax() && $request->has('client')) {
            $clients = $user->where('dni', 'like','%'. $request->client.'%')
                ->orWhere('name', 'like', '%' . $request->client . '%')->get();
            for ($i = 0; $i < count($clients); $i++) {
                $retorn[$i] = [
                    "client" => $clients[$i],
                    "plan" => $clients[$i]->plan
                ];
            }
        } else {
            //todo
        }
        return $retorn;
    }
    /**
     * busqueda ajax para admin.
     * Devuelve admins con id o name que coicida con los parametros
     * @param Request $request
     */
    public function admin(Request $request, Admin $allergy)
    {
        $retorn = "";
        if ($request->ajax() && $request->has('admin')) {
            $retorn = $allergy->where('id', '=', $request->admin)
                ->orWhere('name', 'like', '%' . $request->admin . '%')->get();
        } else {
            //todo
        }
        return $retorn;
    }
    /**
     * busqueda ajax para transporter.
     * Devuelve admins con id o name que coicida con los parametros
     * @param Request $request
     */
    public function transporter(Request $request, Transporter $transporter)
    {
        $retorn = "";
        if ($request->ajax() && $request->has('transporter')) {
            $retorn = $transporter->where('id', '=', $request->transporter)
                ->orWhere('name', 'like', '%' . $request->transporter . '%')->get();
        } else {
            //todo
        }
        return $retorn;
    }
    /**
     * busqueda ajax para allergies.
     * Devuelve allergies con id o name que coicida con los parametros
     * @param Request $request
     */
    public function allergy(Request $request, Allergy $allergy)
    {
        $retorn = "";
        if ($request->ajax() && $request->has('allergy')) {
            $retorn = $allergy->where('id', '=', $request->allergy)
                ->orWhere('name', 'like', '%' . $request->allergy . '%')->get();
        } else {
            //todo
        }
        return $retorn;
    }
    /**
     * busqueda ajax para plans.
     * Devuelve plans con id o name que coicida con los parametros
     * @param Request $request
     */
    public function plan(Request $request, Plan $plan)
    {
        $retorn = ["can_create"=>Auth::user()->can_create,"plan"=>null];
        if ($request->ajax() && $request->has('plan')) {
            $retorn["plan"] = $plan->where('id', '=', $request->plan)
                ->orWhere('name', 'like', '%' . $request->plan . '%')->get();
        } else {
            //todo
        }
        return response()->json($retorn);
    }
    /**
     * busqueda ajax para categories.
     * Devuelve categorias con id o name que coicida con los parametros
     * @param Request $request
     */
    public function category(Request $request, Category $category)
    {
        $retorn = "";
        if ($request->ajax() && $request->has('category')) {
            $retorn = $category->where('id', '=', $request->category)
                ->orWhere('name', 'like', '%' . $request->category . '%')->get();
        } else {
            //todo
        }
        return $retorn;
    }

    /**
     * busqueda ajax para brands.
     * Devuelve marcas con id o name que coicida con los parametros
     * @param Request $request
     */
    public function brand(Request $request, Brand $brand)
    {
        $retorn = "";
        if ($request->ajax() && $request->has('brand')) {
            $retorn = $brand->where('id', '=', $request->brand)
                ->orWhere('name', 'like', '%' . $request->brand . '%')->get();
        } else {
            //todo
        }
        return $retorn;
    }


    /**
     * busqueda ajax para ingredient.
     * Devuelve ingredients con id o name que coicida con los parametros.
     * a la vez las alergies que tiene ese ingrediente
     * @param Request $request
     */
    public function ingredient(Request $request, Ingredient $ingredient)
    {
        $retorn = [];
        if ($request->ajax() && $request->has('ingredient')) {
            $ing = $ingredient->where('id', '=', $request->ingredient)
                ->orWhere('name', 'like', '%' . $request->ingredient . '%')
                ->get();
            for ($i = 0; $i < count($ing); $i++) {
                $retorn[$i] = [
                    "ingredient" => $ing[$i],
                    "allergies" => $ing[$i]->allergies,
                    //"imageUrl"=>Storage::url($ing[$i]->image_path),
                ];
            }

        } else {
            //todo
        }
        return response()->json($retorn);
    }

    /**
     * busqueda ajax para product.
     * Devuelve informacion product con id o name que coicida con los parametros
     * @param Request $request
     */
    public function product(Request $request, Product $product)
    {

        $retorn = [];
        if ($request->ajax() && $request->has('product')) {
            $prod = $product->where('id', '=', $request->product)
                ->orWhere('name', 'like', '%' . $request->product . '%')
                ->get();

            for ($i = 0; $i < count($prod); $i++) {
                $retorn[$i] = [
                    "product" => $prod[$i],
                    "ingredients" => $prod[$i]->ingredients,
                    "categories" => $prod[$i]->categories,
                    "brand" => $prod[$i]->brand,
                    //"brands" => App\Brand::all(),
                   // "images" => $prod[$i]->images, mandamos solo id porque hay problema con json para enviar blob
                     "images" => $prod[$i]->images()->first()->id,
                ];
            }

        } else {
            //todo
        }
        return response()->json($retorn);
    }

    /**
     * busqueda  para la libreria select2. Se devuelve un json con un formato especifico
     * @param Request $request
     */
    public function allergySelect(Request $request, Allergy $allergy)
    {

        $allergies = $allergy->where('name', 'like', '%' . $request->q . '%')->get();
        $formatted_tags = array();
        for ($i = 0; $i < count($allergies); $i++) {
            $formatted_tags[$i] = ['id' => $allergies[$i]->id, 'text' => $allergies[$i]->name];
        }
        return \Response::json($formatted_tags);
    }

    /**
     * busqueda  para la libreria select2. Se devuelve un json con un formato especifico
     * @param Request $request
     */
    public function categorySelect(Request $request, Category $category)
    {

        $categories = $category->where('name', 'like', '%' . $request->q . '%')->get();
        $formatted_tags = array();
        for ($i = 0; $i < count($categories); $i++) {
            $formatted_tags[$i] = ['id' => $categories[$i]->id, 'text' => $categories[$i]->name];
        }
        return \Response::json($formatted_tags);
    }

    /**
     * busqueda  para la libreria select2. Se devuelve un json con un formato especifico
     * @param Request $request
     */
    public function IngredientSelect(Request $request, Ingredient $ingredient)
    {

        $ingredients = $ingredient->where('name', 'like', '%' . $request->q . '%')->get();
        $formatted_tags = array();
        for ($i = 0; $i < count($ingredients); $i++) {
            $formatted_tags[$i] = ['id' => $ingredients[$i]->id, 'text' => $ingredients[$i]->name];
        }
        return \Response::json($formatted_tags);
    }

    /**
     * busqueda  para la libreria select2. Se devuelve un json con un formato especifico
     * @param Request $request
     */
    public function brandSelect(Request $request, Brand $brand)
    {

        $brands = $brand->where('name', 'like', '%' . $request->q . '%')->get();
        $formatted_tags = array();
        for ($i = 0; $i < count($brands); $i++) {
            $formatted_tags[$i] = ['id' => $brands[$i]->id, 'text' => $brands[$i]->name];
        }
        return \Response::json($formatted_tags);
    }

    /**
     * Query que devuelve los usuarios suscritos del año actual group by month
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCurrentYearMonthlySubs(){

        $users = DB::table('users')->join('plans','plans.id','plan_id')->select("plan_id",  DB::raw("MONTH(subscribed_at)  as month"),DB::raw('count(*) as total'))
            ->whereNotNull('plan_id')->whereYear('subscribed_at',date("Y"))->groupBy("month","plan_id")
            ->get();
        return response()->json($users);
        //--end getting current month subscribers

    }

    /**
     * Query que devuelve los plans con el total de usuarios suscritos en cada uno
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTotalPlanUser(){

           $monthlySubscribers=[];
           try{
               $usersCharming=App\User::whereHas('plan', function ($query) {
                   $query->where('id', '=', 1);
                    //   ->whereMonth('subscribed_at',date("m"));
               })->get()->count();

               $usersPro=App\User::whereHas('plan', function ($query) {
                   $query->where('id', '=', 2);
                    //   ->whereMonth('subscribed_at',date("m"));
               })->get()->count();

               $usersPremium=App\User::whereHas('plan', function ($query) {
                   $query->where('id', '=', 3);
                      // ->whereMonth('subscribed_at',date("m"));
               })->get()->count();

               $monthlySubscribers=[
                   "Charming"=>$usersCharming,
                   "Pro"=>$usersPro,
                   "Premium"=>$usersPremium
               ];
           }catch (Exception $e){
               $monthlySubscribers=[
                   "Charming"=>0,
                   "Pro"=>0,
                   "Premium"=>0
               ];
           }
         return response()->json($monthlySubscribers);
    }


}
