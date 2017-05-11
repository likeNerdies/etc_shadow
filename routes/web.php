<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//rutas para la autenticacion
Auth::routes();


//controladorHOME ruta-             El usuario será redirigido a la página principal despu
Route::get('/home', 'HomeController@index');

Route::prefix('/user/panel')->group(function () {//user panel route

    Route::get('/', function () {//redirect my.app/user/panel  -->> to -->> my.app/user/panel/profile
        return redirect(route('profile'));
    });

    Route::get('/profile', 'user\UserController@index')->name('profile');

    Route::delete('/profile/delete', 'user\UserController@destroy')->name('user-delete');
    Route::get('/profile/delete', 'user\UserController@destroymenu')->name('user-delete');

    Route::prefix('/my-data')->group(function () {//user panel my data route

        Route::get('/', 'user\UserController@data')->name('my-data');
        Route::put('/personal', 'user\UserController@update')->name('my-data-personal');//upadte user personal data
        Route::put('/personal-password', 'user\UserController@updatePassword')->name('my-data-personal-password');//update user personal password

        Route::get('/address', 'address\AddressController@index')->name("address");
        Route::put('/address', 'address\AddressController@updateUserAddress')->name('user-address');
    });//end user panel my data route


});//end user panel route


//ROUTE Plans
Route::prefix('/plans')->group(function () {

    Route::get('/', 'plan\PlanController@index');

    Route::post('/', 'plan\PlanController@store'); //añadir restriccion solo admin puede añadir plans

    Route::get('/{plan}', 'plan\PlanController@show');

    Route::get('/create', 'plan\PlanController@create'); //añadir restriccion solo admin puede crear

    Route::get('/{plan}/edit', 'plan\PlanController@edit'); //añadir restriccion solo admin puede editar plans

    Route::put('/{plan}', 'plan\PlanController@update'); //añadir restriccion solo admin puede editar plans

    Route::delete('/{plan}', 'plan\PlanController@delete'); //añadir restriccion solo admin puede eliminar plans

});//end ROUTE Plans


//ROUTE Products
Route::prefix('/products')->group(function () {

    Route::get('/', 'product\ProductController@index');

    Route::post('/', 'product\ProductController@store'); //añadir restriccion solo admin puede añadir products

    Route::get('/{product}', 'product\ProductController@show');

    Route::get('/create', 'product\ProductController@create'); //añadir restriccion solo admin puede crear

    Route::get('/{product}/edit', 'product\ProductController@edit'); //añadir restriccion solo admin puede editar products

    Route::put('/{product}', 'product\ProductController@update'); //añadir restriccion solo admin puede editar products

    Route::delete('/{product}', 'product\ProductController@delete'); //añadir restriccion solo admin puede eliminar products


});//end ROUTE Products


//Route Categories
Route::prefix('/categories')->group(function () {

    Route::get('/', 'category\CategoryController@index'); //añadir restriccion admin

    Route::post('/', 'category\CategoryController@store'); //añadir restriccion solo admin puede añadir products

    Route::get('/{category}', 'category\CategoryController@show');

    Route::put('/{category}', 'category\CategoryController@update'); //añadir restriccion solo admin puede editar products

    Route::delete('/{category}', 'category\CategoryController@delete'); //añadir restriccion solo admin puede eliminar products


});//end Route Categories


//Route Ingredients
Route::prefix('/ingredients')->group(function () {

    Route::get('/', 'ingredient\IngredientController@index'); //añadir restriccion admin

    Route::post('/', 'ingredient\IngredientController@store'); //añadir restriccion solo admin puede añadir products

    Route::get('/{ingredient}', 'ingredient\IngredientController@show');

    Route::put('/{ingredient}', 'ingredient\IngredientController@update'); //añadir restriccion solo admin puede editar products

    Route::delete('/{ingredient}', 'ingredient\IngredientController@delete'); //añadir restriccion solo admin puede eliminar products

});//end Route Ingredients

// Admin routes
Route::prefix('/admin')->group(function () {
  Route::get('/', function() {
    return view('admin.index');
  });
});

