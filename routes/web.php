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
    Route::get('/configuration', 'admin\AdminController@configuration')->name('admin.configuration');
    Route::put('/update', 'admin\AdminController@update')->name('admin.update');



    Route::get('/admin-users', 'admin\AdminController@adminUsers')->name('admin.adminUsers');
    Route::get('/admin-users/{id}', 'admin\AdminController@show')->name('admin.adminUserShow');
    Route::delete('/admin-users/{id}', 'admin\AdminController@delete')->name('admin.adminUserDelete');
    Route::post('/admin-users', 'admin\AdminController@store')->name('admin.adminUserStore');
    Route::put('/admin-users/{id}', 'admin\AdminController@updateAdminUser')->name('admin.adminUserUpdate');

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
    Route::post('/products/{id}/image', 'product\ProductController@storeImage');
    Route::get('/products/{id}/image', 'product\ProductController@showPicture');
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
    Route::post('/ingredients/{id}/image', 'ingredient\IngredientController@storeImage');
    Route::get('/ingredients/{id}/image', 'ingredient\IngredientController@showPicture');
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


    //Route Clients
    Route::prefix('/clients')->group(function () {
        Route::get('/', 'user\UserController@adminIndex');
       // Route::post('/', 'user\UserController@adminStore');
        Route::get('/{client}', 'user\UserController@adminShow');
        Route::put('/{client}', 'user\UserController@adminUpdate');
        Route::delete('/{client}', 'user\UserController@adminDelete');
    });
    //end Route Client

});//END ADMIN GROUP ROUTES


//search routes

Route::prefix('/search')->group(function (){

    Route::get('/category','search\SearchController@category')->middleware('auth:admin')->name('search.category');

    Route::get('/brand','search\SearchController@brand')->middleware('auth:admin')->name('search.brand');

    Route::get('/allergySelect','search\SearchController@allergySelect')->middleware('auth:admin')->name('search.allergySelect');

    Route::get('/ingredient','search\SearchController@ingredient')->middleware('auth:admin')->name('search.ingredient');

    Route::get('/categorySelect','search\SearchController@categorySelect')->middleware('auth:admin')->name('search.categorySelect');

    Route::get('/ingredientSelect','search\SearchController@IngredientSelect')->middleware('auth:admin')->name('search.ingredientSelect');

    Route::get('/brandSelect','search\SearchController@brandSelect')->middleware('auth:admin')->name('search.brandSelect');

    Route::get('/product','search\SearchController@product')->middleware('auth:admin')->name('search.product');

    Route::get('/plan','search\SearchController@plan')->middleware('auth:admin')->name('search.plan');

    Route::get('/allergy','search\SearchController@allergy')->middleware('auth:admin')->name('search.allergy');

    Route::get('/admin','search\SearchController@admin')->middleware('auth:admin')->name('search.admin');

    Route::get('/client','search\SearchController@client')->middleware('auth:admin')->name('search.client');

});


//