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

Route::prefix('/user/panel')->group(function(){//user panel route

    Route::get('/', function () {//redirect my.app/user/panel  -->> to -->> my.app/user/panel/profile
        return redirect(route('profile'));
    });

    Route::get('/profile','user\UserController@index')->name('profile');

    Route::delete('/profile/delete','user\UserController@destroy')->name('user-delete');
    Route::get('/profile/delete','user\UserController@destroymenu')->name('user-delete');

    Route::prefix('/my-data')->group(function (){//user panel my data route

        Route::get('/','user\UserController@data')->name('my-data');
        Route::put('/personal','user\UserController@update')->name('my-data-personal');//upadte user personal data
        Route::put('/personal-password','user\UserController@updatePassword')->name('my-data-personal-password');//update user personal password

        Route::get('/address','address\AddressController@index')->name("address");
        Route::put('/address','address\AddressController@updateUserAddress')->name('user-address');
    });//end user panel my data route


});//end user panel route

//ROUTE PLANS
Route::prefix('/plan')->group(function (){
    Route::get('/','plan\PlanController@index')->name('plan');
    Route::post('/','plan\PlanController@store')->name('plan');
});
//END ROUTE PLANS


//ROUTE Productos
Route::prefix('/products')->group(function (){

    Route::get('/','product\ProductController@index');

    Route::post('/store','product\ProductController@store'); //añadir restriccion solo admin puede añadir products



});
