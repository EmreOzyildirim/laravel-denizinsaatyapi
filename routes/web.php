<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;


use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\PageHeaderController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\FeaturedPropertiesController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\WhyChooseUsController;
use App\Http\Controllers\admin\AgentsController;
use App\Http\Controllers\admin\CustomerFeedbackController;
use App\Http\Controllers\admin\ReferencesController;
use App\Http\Controllers\admin\SEOController;
use App\Http\Controllers\admin\SocialMediaController;
use App\Http\Controllers\admin\FooterbackController;

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

    Route::get('/admin/index',[AdminController::class,'index']);
    Route::get('/admin/page-header',[PageHeaderController::class,'index']);
    Route::get('/admin/menu',[MenuController::class,'index']);
    Route::get('/admin/featured-properties',[FeaturedPropertiesController::class,'index']);
    Route::get('/admin/categories',[CategoriesController::class,'index']);
    Route::get('/admin/why-choose-us',[WhyChooseUsController::class,'index']);
    Route::get('/admin/agents',[AgentsController::class,'index']);
    Route::get('/admin/customer-feedback',[CustomerFeedbackController::class,'index']);
    Route::get('/admin/references',[ReferencesController::class,'index']);
    Route::get('/admin/seo-options',[SEOController::class,'index']);
    Route::get('/admin/social-media',[SocialMediaController::class,'index']);
    Route::get('/admin/footer',[FooterController::class,'index']);

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
