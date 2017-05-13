<?php

namespace App\Http\Controllers\Search;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * busqueda ajax para category
     * @param Request $request
     */
    public function category(Request $request, Category $category){
        $retorn="";
        if($request->ajax() && $request->has('category')){
            $retorn=  $category->where('name','like','%' . $request->category .'%')->get();
        }else{
            //todo
        }
        return $retorn;
    }
}
