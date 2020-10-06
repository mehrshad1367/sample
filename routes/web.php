<?php

use Illuminate\Support\Facades\Route;

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
//    return view('welcome');

});
Auth::routes();
//Route::get('author/edit/2', function(){
//dd();
//    return redirect('profile/2');
//});
Route::get('lang/{ln}', 'Lang\LangController@ln')->name('lang');

Route::group(['middleware' => ['langCheck']], function () {
Route::group(['middleware'=>['auth']], function (){





    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//-----------------------Profile-------------------------------
    Route::group(['namespace' => 'Profile'], function () {
        Route::get('profile/{id}', 'ProfileController@show')->name('profile.show');
        Route::post('profile/avatar/{id}', 'ProfileController@avatar')->name('profile.avatar');
        Route::get('profile/edit/{id}', 'ProfileController@edit')->name('profile.edit');
        Route::post('profile/update/{id}', 'ProfileController@update')->name('profile.update');
    });
//-----------------------Access--------------------------------
    Route::group(['middleware' => ['access']], function () {
        Route::get('adminPortal', 'Admin\AdminController@index')->name('admin.Portal');
        Route::get('authorPortal', 'Author\AuthorController@index')->name('author.Portal');
        Route::get('author/edit/{id}', 'Author\AuthorController@edit')->name('author.edit');
        Route::post('author/update/{id}', 'Author\AuthorController@update')->name('author.update');
        Route::get('author/confirm/{id}', 'Author\AuthorController@confirm')->name('author.confirm');
        Route::get('author/delete/{id}', 'Author\AuthorController@delete')->name('author.delete');
    });

});
    Route::get('index', 'UI\UIController@index')->name('index');
    Route::get('contact', 'UI\UIController@contact')->name('contact');
    Route::post('getinfo/{id}', 'Click\ClientInfoController@click')->name('getinfo');
Route::get('/setting',function (){

})->name('setting');
});

//---------------------------Exception-------------------------------
//Route::get('exception', function(){
//    try {
//
//        \App\Http\Models\User::get(1021);
//    }catch (Exception $exception){
//
//        throw new \App\Exceptions\CostumException($exception->getMessage());
//    };
//});

//Route::view('exception/view', 'exception\view');

Route::get('pay','Payment\PayOrderController@store')->name('pay');

Route::get('zagma/getPrice', 'PostController@getPrice');
Route::get('zagma/orderstatus', 'PostController@orderstatus');
Route::get('zagma/requestpricepostnew', 'PostController@requestpricepostnew');
Route::get('zagma/orderwitharray', 'PostController@orderwitharray');

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');


Route::get('marketing/Dads/edit/{id}','DPaneloAdvertisingController@edit')->name('Dads.edit');
