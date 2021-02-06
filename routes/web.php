<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;


use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\PageHeaderController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\PropertiesController;
use App\Http\Controllers\admin\FeaturedPropertiesController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\WhyChooseUsController;
use App\Http\Controllers\admin\AgentsController;
use App\Http\Controllers\admin\CustomerFeedbackController;
use App\Http\Controllers\admin\ReferencesController;
use App\Http\Controllers\admin\SEOController;
use App\Http\Controllers\admin\SocialMediaController;
use App\Http\Controllers\admin\FooterController;

use App\Models\categories;
use App\Models\properties;
use App\Models\agents;

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

//file manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

//Admin Panel Routes
Route::group(['namespace' => 'admin'], function () {
    Route::get('/admin',function (){
        header('Location:/admin/index');
        exit();
    });

    Route::get('/admin/index', [AdminController::class, 'index']);

    Route::get('/admin/page-header', [PageHeaderController::class, 'index']);
    Route::post('/admin/page-header', [PageHeaderController::class, 'update']);

    Route::get('/admin/menu', [MenuController::class, 'index']);

    Route::get('/admin/properties', [PropertiesController::class, 'index']);

    Route::get('/admin/create-property', [PropertiesController::class, 'create_property']);
    Route::post('/admin/create-property', [PropertiesController::class, 'create_property_post']);

    Route::get('/admin/update-property/{id}', [PropertiesController::class, 'update']);
    Route::post('/admin/update-property', [PropertiesController::class, 'update_post']);


    Route::get('/admin/delete-property/{id}', [PropertiesController::class, 'delete']);

    Route::get('/admin/featured-properties', [FeaturedPropertiesController::class, 'index']);

    Route::get('/admin/categories', [CategoriesController::class, 'index']);
    Route::get('/admin/category-delete/{id}', function ($id) {

        $category = categories::find($id);

        if(!empty($category))
            $category->delete();

        $categories = categories::all();
        return view('/admin/categories', ['categories' => $categories]);
    });

    Route::get('/admin/create-category', [CategoriesController::class, 'create_category']);
    Route::post('/admin/create-category', [CategoriesController::class, 'create_category_post']);

    Route::get('/admin/update-category/{id}', [CategoriesController::class, 'update']);
    Route::post('/admin/update-category', [CategoriesController::class, 'update_post']);

    Route::get('/admin/why-choose-us', [WhyChooseUsController::class, 'index']);
    Route::post('/admin/why-choose-us', [WhyChooseUsController::class, 'update']);

    Route::post('/admin/why-choose-us/create-icon-item', [WhyChooseUsController::class, 'create_icon_item']);
    Route::get('/admin/why-choose-us/update-icon-item/{id}', [WhyChooseUsController::class, 'icon_item']);
    Route::post('/admin/why-choose-us/update-icon-item', [WhyChooseUsController::class, 'update_icon_item']);

    Route::get('/admin/why-choose-us/delete-icon-item/{id}', [WhyChooseUsController::class, 'delete_icon_item']);

    Route::get('/admin/agents', [AgentsController::class, 'index']);

    Route::get('/admin/create-agent', [AgentsController::class, 'create_agent']);
    Route::post('/admin/create-agent', [AgentsController::class, 'create_agent_post']);

    Route::get('/admin/update-agent/{id}', [AgentsController::class, 'update_agent']);
    Route::post('/admin/update-agent', [AgentsController::class, 'update_agent_post']);

    Route::get('/admin/delete-agent/{id}', [AgentsController::class, 'delete_agent']);

    Route::get('/admin/customer-feedbacks',[CustomerFeedbackController::class, 'index']);




    Route::get('/admin/footer',[FooterController::class, 'index']);




    Route::get('/admin/customer-feedback', [CustomerFeedbackController::class, 'index']);
    Route::get('/admin/references', [ReferencesController::class, 'index']);
    Route::get('/admin/seo-options', [SEOController::class, 'index']);
    Route::get('/admin/social-media', [SocialMediaController::class, 'index']);
    Route::get('/admin/footer', [FooterController::class, 'index']);

});

//Frontend Panel Routes
Route::group(['namespace' => 'frontend'], function () {

    Route::get('/', [HomeController::class, 'index']);
    Route::get('/anasayfa', [HomeController::class, 'index']);

});

Route::get('/welcome', 'App\Http\Controllers\PageController@index');

Route::get('/show', 'App\Http\Controllers\PageController@show');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact/{name?}/{surname?}', function ($ad = null, $surname = null) {
    return $ad . " " . $surname;
});

Route::get('/regex/{name?}/{surname?}', function ($ad = null, $surname = null) {
    return $ad . " " . $surname;
})->where('name', '[0-9]+');

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
