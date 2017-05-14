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
})->name('index');

//rutas para la autenticacion
Auth::routes();


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


//ROUTE LOGIN FOR ADMIN

Route::get('/admin/login', 'auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'auth\AdminLoginController@login')->name('admin.login');
//END ROUTE LOGIN ADMIN

//ROUTE GROUP FOR ADMIN
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin',], function () {

    Route::get('/', 'admin\AdminController@index')->name('admin.dashboard');
    //ROUTE Plans
    Route::resource('/plans', 'plan\PlanController');
    /*
    Route::prefix('/plans')->group(function () {
          Route::get('/', 'plan\PlanController@index');
          Route::post('/', 'plan\PlanController@store');
          Route::get('/{plan}', 'plan\PlanController@show');
          Route::get('/create', 'plan\PlanController@create');
          Route::get('/{plan}/edit', 'plan\PlanController@edit');
          Route::put('/{plan}', 'plan\PlanController@update');
          Route::delete('/{plan}', 'plan\PlanController@delete');
      });//end ROUTE Plans
  */

//ROUTE Products
    Route::resource('/products', 'product\ProductController');
    /*
    Route::prefix('/products')->group(function () {
        Route::get('/', 'product\ProductController@index');
        Route::post('/', 'product\ProductController@store');
        Route::get('/{product}', 'product\ProductController@show');
        Route::get('/create', 'product\ProductController@create');
        Route::get('/{product}/edit', 'product\ProductController@edit');
        Route::put('/{product}', 'product\ProductController@update');
        Route::delete('/{product}', 'product\ProductController@delete');
    });//end ROUTE Products

*/
//Route Categories
    Route::resource('/categories', 'category\CategoryController');

    /*    Route::prefix('/categories')->group(function () {
           Route::get('/', 'category\CategoryController@index');
           Route::post('/', 'category\CategoryController@store');
           Route::get('/{category}', 'category\CategoryController@show');
           Route::put('/{category}', 'category\CategoryController@update');
           Route::delete('/{category}', 'category\CategoryController@delete');
       });//end Route Categories
   */
    //Route Ingredients
    Route::resource('/ingredients', 'ingredient\IngredientController');
    /*
    Route::prefix('/ingredients')->group(function () {
        Route::get('/', 'ingredient\IngredientController@index');
        Route::post('/', 'ingredient\IngredientController@store');
        Route::get('/{ingredient}', 'ingredient\IngredientController@show');
        Route::put('/{ingredient}', 'ingredient\IngredientController@update');
        Route::delete('/{ingredient}', 'ingredient\IngredientController@delete');
    });//end Route Ingredients
    */

//Route Brands
    Route::resource('/brands', 'brand\BrandController');
    /*
    Route::prefix('/brands')->group(function () {
        Route::get('/', 'brand\BrandController@index');
        Route::post('/', 'brand\BrandController@store');
        Route::get('/{brand}', 'brand\BrandController@show');
        Route::put('/{brand}', 'brand\BrandController@update');
        Route::delete('/{brand}', 'brand\BrandController@delete');
    });//end Route  Brands
    */

    //Route Allergies
    Route::resource('/allergies', 'allergy\AllergyController');
    //end ROUTE Allergies

    //Route Transporters
    Route::resource('/transporters', 'transporter\TransporterController');
    //end Route Transporters

});//END ADMIN GROUP ROUTES


//search route

Route::prefix('/search')->group(function (){
    Route::get('/category','search\SearchController@category')->middleware('auth:admin')->name('search.category');



    Route::get('/brand','search\SearchController@brand')->middleware('auth:admin')->name('search.brand');
});


//