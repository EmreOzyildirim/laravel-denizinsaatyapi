<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PageController;
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
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\ContactFormFromSite;

/*use App\Http\Controllers\admin\SEOController;*/

use App\Http\Controllers\admin\SocialMediaController;
use App\Http\Controllers\admin\FooterController;
use App\Http\Controllers\admin\ContactAndMapController;
use App\Http\Controllers\admin\AboutUsController;

use App\Models\categories;
use App\Models\properties;
use App\Models\property_images;
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

//login admin redirect
Route::get('/admin', function () {
    header('Location:/admin/index');
    exit();
});

//send the property_coount, agent_count, category_count
View::composer(['/admin/*'], function ($view) {

    $property_count = json_decode(properties::getPropertyCount(), true);
    $category_count = json_decode(categories::getCategoryCount(), true);
    $agent_count = json_decode(agents::getAgentCount(), true);

    $view->with('property_count', $property_count);
    $view->with('category_count', $category_count);
    $view->with('agent_count', $agent_count);


});

//Admin Panel Routes
Route::group(['namespace' => 'admin'], function () {
    Route::get('/admin', function () {
        header('Location:/admin/index');
        exit();
    });


    Route::get('/admin/mail-send', [PageController::class, 'send_mail']);
    Route::post('/admin/mail-send', [PageController::class, 'send_mail_post']);

    Route::get('/admin/index', [AdminController::class, 'index']);

    Route::get('/admin/page-header', [PageHeaderController::class, 'index']);
    Route::post('/admin/page-header', [PageHeaderController::class, 'update']);

    Route::get('/admin/menu', [MenuController::class, 'index']);

    Route::get('/admin/properties', [PropertiesController::class, 'index']);

    Route::get('/admin/create-property', [PropertiesController::class, 'create_property']);
    Route::post('/admin/create-property', [PropertiesController::class, 'create_property_post']);

    Route::get('/admin/update-property/{id}', [PropertiesController::class, 'update']);
    Route::post('/admin/update-property', [PropertiesController::class, 'update_post']);

    Route::get('/admin/update-property/{id}/remove_image/{image_id}', function ($id, $remove_image) {
        $property_images = property_images::find($remove_image);
        unlink(public_path('images/properties/' . $property_images->image_path));
        $property_images->delete();


        return redirect('/admin/update-property/' . $id);
    });

    Route::post('/admin/search-districts', [PropertiesController::class, 'search_districts']);
    Route::post('/admin/search-neighborhoods', [PropertiesController::class, 'search_neighborhoods']);

    Route::get('/admin/delete-property/{id}', [PropertiesController::class, 'delete']);

    Route::get('/admin/featured-properties', [FeaturedPropertiesController::class, 'index']);

    Route::get('/admin/categories', [CategoriesController::class, 'index']);
    Route::get('/admin/category-delete/{id}', function ($id) {

        $category = categories::find($id);

        if (!empty($category)) {
            $category->delete();
            unlink(public_path('images/categories/' . $category['image_path']));
        }


        $categories = categories::all();
        return view('/admin/categories', ['categories' => $categories]);
    });

    Route::get('/admin/create-category', [CategoriesController::class, 'create_category']);
    Route::post('/admin/create-category', [CategoriesController::class, 'create_category_post']);

    Route::get('/admin/update-category/{id}', [CategoriesController::class, 'update']);
    Route::post('/admin/update-category', [CategoriesController::class, 'update_post']);

    Route::get('/admin/why-choose-us', [WhyChooseUsController::class, 'index']);
    Route::post('/admin/why-choose-us', [WhyChooseUsController::class, 'update']);

    Route::get('/admin/why-choose-us-icons', [WhyChooseUsController::class, 'why_choose_us_icons']);

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

    Route::get('/admin/customer-feedbacks', [CustomerFeedbackController::class, 'index']);
    Route::get('/admin/create-customer-feedback', [CustomerFeedbackController::class, 'create_customer_feedback']);
    Route::post('/admin/create-customer-feedback', [CustomerFeedbackController::class, 'create_customer_feedback_post']);

    Route::get('/admin/update-customer-feedback/{id}', [CustomerFeedbackController::class, 'update_customer_feedback']);
    Route::post('/admin/update-customer-feedback', [CustomerFeedbackController::class, 'update_customer_feedback_post']);

    Route::get('/admin/delete-customer-feedback/{id}', [PropertiesController::class, 'delete_customer_feedback']);


    Route::get('/admin/create-featured-property', [FeaturedPropertiesController::class, 'index']);
    Route::post('/admin/create-featured-property', [FeaturedPropertiesController::class, 'create_featured_property_post']);


    Route::get('/admin/footer', [FooterController::class, 'index']);
    Route::post('/admin/footer', [FooterController::class, 'footer']);

    Route::get('/admin/useful-links', [FooterController::class, 'useful_links']);
    Route::post('/admin/useful-links', [FooterController::class, 'useful_links_post']);


    Route::get('/admin/social-media', [SocialMediaController::class, 'index']);
    Route::post('/admin/social-media', [SocialMediaController::class, 'social_media_icons_update']);

    Route::get('/admin/references', [ReferencesController::class, 'index']);
    /*Route::get('/admin/seo-options', [SEOController::class, 'index']);*/
    Route::get('/admin/footer', [FooterController::class, 'index']);

    Route::get('/admin/about-us', [AboutUsController::class, 'index']);
    Route::post('/admin/update-about-us', [AboutUsController::class, 'update_post']);


    Route::get('/admin/contact-and-map', [ContactAndMapController::class, 'index']);
    Route::post('/admin/contact-and-map', [ContactAndMapController::class, 'update']);


    Route::get('/admin/contact-form-from-site', [ContactFormFromSite::class, 'index']);

});

//Frontend Panel Routes
Route::group(['namespace' => 'frontend'], function () {

    Route::get('/', [HomeController::class, 'index']);
    Route::get('/anasayfa', [HomeController::class, 'index']);

    Route::get('/ilanlar', [HomeController::class, 'properties']);

    Route::get('/ilan-detay/{id}', [HomeController::class, 'property_details']);
    Route::get('/danisman-ilanlari/{id}', [HomeController::class, 'agents_properties']);

    Route::get('/hakkimizda', [HomeController::class, 'about_us']);

    Route::get('/danismanlarimiz', [HomeController::class, 'agents']);

    Route::get('/referanslar', [HomeController::class, 'references']);

    Route::get('/iletisim', [HomeController::class, 'contact']);
    Route::post('/send-contact-mail', [ContactController::class, 'send_form_post']);

    Route::post('/detayli-arama', [HomeController::class, 'search_with_details']);

});


Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/anasayfa', [HomeController::class, 'index']);
