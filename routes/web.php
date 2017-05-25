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

Route::group(['prefix' => 'user/panel', 'middleware' => 'auth',], function () {
//Route::prefix('/user/panel')->group(function () {//user panel route

    Route::get('/', function () {//redirect my.app/user/panel  -->> to -->> my.app/user/panel/profile
        return redirect(route('profile'));
    });

    Route::get('/profile', 'User\UserController@index')->name('profile');

    Route::delete('/profile/delete', 'User\UserController@destroy')->name('user-delete');
    Route::get('/profile/delete', 'User\UserController@destroymenu')->name('user-delete');

    //personal data user
    //    /user/panel/my-data
    Route::prefix('/my-data')->group(function () {//user panel my data route

        Route::get('/', 'User\UserController@data')->name('my-data');
        Route::put('/personal', 'User\UserController@update')->name('my-data-personal');//upadte user personal data
        Route::put('/personal-password', 'User\UserController@updatePassword')->name('my-data-personal-password');//update user personal password

        Route::get('/address', 'Address\AddressController@index')->name("address");
        Route::put('/address', 'Address\AddressController@update')->name('user-address-update');
        Route::post('/address', 'Address\AddressController@store')->name('user-address-insert');
    });//end user panel my data route


    //    /user/panel/plan
    Route::prefix('/plan')->group(function () {//user plan route
        Route::get('/', 'User\UserController@plan')->name('user-plan');
        Route::post('/subscribe', 'User\UserController@subscribeToPlan')->name('user-subscribe');
        Route::post('/cancelSub', 'User\UserController@cancelSubscription')->name('user-cancelSub');
        Route::post('/changePlan', 'User\UserController@subscribeToPlan')->name('user-change-plan');
    });

    Route::get('/help','User\UserController@help')->name('help');

    Route::get('/ingredients', 'User\UserController@unlikeIngredientShow')->name('user-ingredients');
    Route::post('/ingredients/like', 'User\UserController@likeIngredientStore')->name('user-like-ingredients');
    Route::post('/ingredients/unlike', 'User\UserController@unlikeIngredientStore')->name('user-unlike-ingredients');

    Route::post('/allergies', 'User\UserController@userAllergyShow')->name('user-allergy');
    Route::post('/allergies/has', 'User\UserController@userAllergyStore')->name('user-has-allergy');
    Route::post('/allergies/doesnt', 'User\UserController@userHasntAllergyStore')->name('user-doesnt-allergy');


});//end user panel route

Route::prefix('/products')->group(function () {//Product route
    Route::get('/', 'Product\ProductController@productsIndex')->name('products-index');
    Route::get('/{id}', 'Product\ProductController@productsIndexShow')->name('products-index-show');
    Route::get('/{id}/image', 'Product\ProductController@showPicture')->name('product-image-number');
    Route::get('/{id}/image/{number}', 'Product\ProductController@showPictureNumber')->name('product-image-number');

    Route::get('/search/dynamic', 'Product\ProductController@dynamicQuery')->name('dynamicSearch');
});// end product route


//ROUTE LOGIN FOR ADMIN
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login');
//END ROUTE LOGIN ADMIN

//ROUTE GROUP FOR ADMIN
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin',], function () {

    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/configuration', 'Admin\AdminController@configuration')->name('admin.configuration');
    Route::put('/update', 'Admin\AdminController@update')->name('admin.update');


    //Routes for admin users table
    Route::get('/admin-users', 'Admin\AdminController@adminUsers')->name('admin.adminUsers');
    Route::get('/admin-users/{id}', 'Admin\AdminController@show')->name('admin.adminUserShow');
    Route::delete('/admin-users/{id}', 'Admin\AdminController@delete')->name('admin.adminUserDelete');
    Route::post('/admin-users', 'Admin\AdminController@store')->name('admin.adminUserStore');
    Route::put('/admin-users/{id}', 'Admin\AdminController@updateAdminUser')->name('admin.adminUserUpdate');

    //ROUTE Plans
    Route::resource('/plans', 'Plan\PlanController');
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
    Route::resource('/products', 'Product\ProductController');
    Route::post('/products/{id}/image', 'Product\ProductController@storeImage');
    Route::get('/products/{id}/image', 'Product\ProductController@showPicture');
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
    Route::resource('/categories', 'Category\CategoryController');

    /*    Route::prefix('/categories')->group(function () {
           Route::get('/', 'category\CategoryController@index');
           Route::post('/', 'category\CategoryController@store');
           Route::get('/{category}', 'category\CategoryController@show');
           Route::put('/{category}', 'category\CategoryController@update');
           Route::delete('/{category}', 'category\CategoryController@delete');
       });//end Route Categories
   */
    //Route Ingredients
    Route::resource('/ingredients', 'Ingredient\IngredientController');
    Route::post('/ingredients/{id}/image', 'Ingredient\IngredientController@storeImage');
    Route::get('/ingredients/{id}/image', 'Ingredient\IngredientController@showPicture');
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
    Route::resource('/brands', 'Brand\BrandController');
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
    Route::resource('/allergies', 'Allergy\AllergyController');
    //end ROUTE Allergies

    //Route Transporters
    Route::resource('/transporters', 'Transporter\TransporterController');
    //end Route Transporters


    //Route Clients
    Route::prefix('/clients')->group(function () {
        Route::get('/', 'User\UserController@adminIndex');
        // Route::post('/', 'user\UserController@adminStore');
        Route::get('/{client}', 'User\UserController@adminShow');
        Route::put('/{client}', 'User\UserController@adminUpdate');
        Route::delete('/{client}', 'User\UserController@adminDelete');
    });
    //end Route Client

});//END ADMIN GROUP ROUTES


//search routes

Route::prefix('/search')->group(function () {

    Route::get('/category', 'Search\SearchController@category')->middleware('auth:admin')->name('search.category');

    Route::get('/brand', 'Search\SearchController@brand')->middleware('auth:admin')->name('search.brand');

    Route::get('/allergySelect', 'Search\SearchController@allergySelect')->middleware('auth:admin')->name('search.allergySelect');

    Route::get('/ingredient', 'Search\SearchController@ingredient')->middleware('auth:admin')->name('search.ingredient');

    Route::get('/categorySelect', 'Search\SearchController@categorySelect')->middleware('auth:admin')->name('search.categorySelect');

    Route::get('/ingredientSelect', 'Search\SearchController@IngredientSelect')->middleware('auth:admin')->name('search.ingredientSelect');

    Route::get('/brandSelect', 'Search\SearchController@brandSelect')->middleware('auth:admin')->name('search.brandSelect');

    Route::get('/product', 'Search\SearchController@product')->middleware('auth:admin')->name('search.product');

    Route::get('/plan', 'Search\SearchController@plan')->middleware('auth:admin')->name('search.plan');

    Route::get('/allergy', 'Search\SearchController@allergy')->middleware('auth:admin')->name('search.allergy');

    Route::get('/admin', 'Search\SearchController@admin')->middleware('auth:admin')->name('search.admin');

    Route::get('/client', 'Search\SearchController@client')->middleware('auth:admin')->name('search.client');

    //per graphics
    Route::get('/currentYearMonthSubs', 'Search\SearchController@getCurrentYearMonthlySubs')->middleware('auth:admin')->name('search.currentMonthSubscribers');
    Route::get('/totalUserPerPlan', 'Search\SearchController@getTotalPlanUser')->middleware('auth:admin')->name('search.usersPerPlan');


});


Route::get('/box-test', 'Box\BoxController@makeBox')->middleware('auth:admin');


//lang change rout

Route::post("changelocale", 'Lang\LocaleController@changeLocale')->name('change-lang');