<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminPageController;
use App\Http\Controllers\frontend\HomeController;

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

//Admin Panel Routes
Route::group(['namespace'=>'admin'], function(){

    Route::get('/admin/home',[AdminPageController::class,'index']);

});

//Frontend Panel Routes
Route::group(['namespace'=>'frontend'], function(){

    Route::get('/',[HomeController::class,'index']);
    Route::get('/anasayfa',[HomeController::class,'index']);


});













Route::get('/welcome', 'App\Http\Controllers\PageController@index');

Route::get('/show', 'App\Http\Controllers\PageController@show');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact/{name?}/{surname?}',function ($ad=null,$surname=null){
    return $ad." ".$surname;
});

Route::get('/regex/{name?}/{surname?}',function ($ad=null,$surname=null){
    return $ad." ".$surname;
})->where('name','[0-9]+');

Route::get('/contact',function (){
    return view('contact');
});
