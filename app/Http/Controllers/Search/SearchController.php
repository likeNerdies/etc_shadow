<?php

namespace App\Http\Controllers\Search;

use App\Allergy;
use App\Category;
use App\Brand;
use App\Ingredient;
use App\Product;
use App\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App;

class SearchController extends Controller
{
    /**
     * busqueda ajax para plan
     * @param Request $request
     */
    public function allergy(Request $request, Allergy $plan)
    {
        $retorn = "";
        if ($request->ajax() && $request->has('allergy')) {
            $retorn = $plan->where('id', '=', $request->allergy)
                ->orWhere('name', 'like', '%' . $request->allergy . '%')->get();
        } else {
            //todo
        }
        return $retorn;
    }
    /**
     * busqueda ajax para plan
     * @param Request $request
     */
    public function plan(Request $request, Plan $plan)
    {
        $retorn = "";
        if ($request->ajax() && $request->has('plan')) {
            $retorn = $plan->where('id', '=', $request->plan)
                ->orWhere('name', 'like', '%' . $request->plan . '%')->get();
        } else {
            //todo
        }
        return $retorn;
    }
    /**
     * busqueda ajax para category
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
     * busqueda ajax para brand
     * @param Request $request
     */
    public function brand(Request $request, Brand $brand)
    {
        $retorn = "";
        if ($request->ajax() && $request->has('brand')) {
            $retorn = $brand->where('id', '=', $request->brand)
                ->where('name', 'like', '%' . $request->brand . '%')->get();
        } else {
            //todo
        }
        return $retorn;
    }


    /**
     * busqueda ajax para ingredient
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
                    "allergies" => $ing[$i]->allergies
                ];
            }

        } else {
            //todo
        }
        return response()->json($retorn);
    }

    /**
     * busqueda ajax para product
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
                    "brands" => App\Brand::all(),
                    "images" => $prod[$i]->images,
                ];
            }

        } else {
            //todo
        }
        return response()->json($retorn);
    }

    /**
     * busqueda  para allergy Select
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
     * busqueda  para ingredient Select
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
     * busqueda  para ingredient Select
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
     * busqueda  para brand Select
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


}
