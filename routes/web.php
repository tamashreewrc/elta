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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', 'AdminController@index');
Route::post('/login-submit', 'AdminController@login_submit');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/dashboard', 'DashboardController@index');
    Route::get('/admin/logout', 'DashboardController@logout');
    Route::get('/admin/change_password', 'DashboardController@change_password_view');
    Route::post('/change-password-submit', 'DashboardController@change_password_submit');

    //Route::get('/admin/banner/add', 'BannerController@add');

    //Route::resource('banner', 'BannerController');

    Route::get('/admin/banner', 'BannerController@showAll');

    Route::get('/admin/banner/add', 'BannerController@add');

    Route::get('/admin/banner/edit/{id}', 'BannerController@edit');

    Route::post('/banner/add', 'BannerController@save');

    Route::post('/banner/edit/{id}', 'BannerController@update');

    Route::get('/banner/delete/{id}', 'BannerController@delete');

    Route::get('/admin/settings', 'SettingsController@index');
    Route::post('/admin_settings_submit', 'SettingsController@save_settings');

    Route::get('/admin/service_categories', 'ServiceCategoryController@index');
    Route::get('/admin/service_categories/add', 'ServiceCategoryController@add');
    Route::post('/service_category/add_submit', 'ServiceCategoryController@add_submit');
    Route::get('/admin/service_categories/edit/{service_category_id}', 'ServiceCategoryController@edit_view');
    Route::post('/service_category/edit_submit/{service_category_id}', 'ServiceCategoryController@edit_submit');
    Route::get('/service_category/delete/{service_category_id}', 'ServiceCategoryController@delete');

    Route::get('/admin/testimonial', 'TestimonialController@index');
    Route::get('/admin/testimonial/add', 'TestimonialController@add');
    Route::post('/admin/testimonial_add', 'TestimonialController@save_testimonial');
    Route::get('/admin/testimonial/edit/{id}', 'TestimonialController@edit');
    Route::get('/admin/testimonial/delete/{id}', 'TestimonialController@delete');
    Route::post('/admin/testimonial_edit/{id}', 'TestimonialController@edit_submit');

    Route::get('/admin/teachers', 'TeacherController@index');
    Route::post('/admin/teachers/add', 'TeacherController@add_teacher');
    Route::get('/admin/teacher/fetch_individuals_details', 'TeacherController@fetch_details');
    Route::post('/admin/teachers/edit/{id}', 'TeacherController@edit_teacher');
    Route::get('/admin/teacher/delete/{id}', 'TeacherController@delete_teacher');

    Route::get('/admin/elta', 'EltaController@index');
    Route::get('/admin/elta/add', 'EltaController@add');
    Route::post('/elta/add_submit', 'EltaController@add_submit');
    Route::get('/admin/elta/edit/{elta_id}', 'EltaController@edit_view');
    Route::post('/elta/edit_submit/{elta_id}', 'EltaController@edit_submit');
    Route::get('/elta/delete/{elta_id}', 'EltaController@delete');

    Route::get('/admin/cms/home', 'HomeController@index');
    Route::post('/admin/home_content_submit', 'HomeController@save_home');

    Route::get('/admin/features', 'FeaturedController@index');
    Route::post('/admin/features/add', 'FeaturedController@add');
    Route::get('/admin/feature/delete/{id}', 'FeaturedController@delete');
    Route::get('/admin/features/fetch-individuals', 'FeaturedController@fetch_individuals');
    Route::post('/admin/features/edit/{id}', 'FeaturedController@edit');

    Route::get('/admin/client', 'ClientController@index');
    Route::get('/admin/client/add', 'ClientController@add');
    Route::post('/admin/client_add', 'ClientController@save_client');
    Route::get('/admin/client/edit/{id}', 'ClientController@edit');
    Route::get('/admin/client/delete/{id}', 'ClientController@delete');
    Route::post('/admin/client_edit/{id}', 'ClientController@edit_client');
    Route::get('/admin/client/event/{id}', 'ClientController@view_event');
    Route::get('/admin/event/add/{id}', 'ClientController@add_event');
    Route::post('/admin/event_submit', 'ClientController@event_submit');
    Route::get('/admin/event/edit/{id}', 'ClientController@edit_event');
    Route::post('/admin/event_update/{id}', 'ClientController@update_event');
    Route::get('/admin/event/delete/{id}', 'ClientController@delete_event');
    Route::get('/admin/event_content/delete/{id}', 'ClientController@delete_content');


    Route::get('/admin/team_members', 'TeamMemberController@index');
    Route::get('/admin/team_members/add', 'TeamMemberController@add');
    Route::post('/team_members/add_submit', 'TeamMemberController@add_submit');
    Route::get('/admin/team_members/edit/{team_member_id}', 'TeamMemberController@edit_view');
    Route::post('/team_members/edit_submit/{team_member_id}', 'TeamMemberController@edit_submit');
    Route::get('/team_members/delete/{team_member_id}', 'TeamMemberController@delete');

    Route::get('/admin/cms/about_us', 'AboutController@index');
    Route::post('/admin/about_submit', 'AboutController@save_about');

    Route::get('/admin/cms/resource', 'ResourceController@index');
    Route::post('/admin/resource_submit', 'ResourceController@save_resource');

    Route::get('/admin/download', 'ResourceDownloadController@index');
    Route::get('/admin/download/add', 'ResourceDownloadController@add');
    Route::post('/admin/download_add', 'ResourceDownloadController@save_download');
    Route::get('/admin/download/edit/{id}', 'ResourceDownloadController@edit');
    Route::get('/admin/download/delete/{id}', 'ResourceDownloadController@delete');
    Route::post('/admin/download_edit/{id}', 'ResourceDownloadController@edit_download');

    Route::get('/admin/cms/contact_us', 'ContactController@index');
    Route::post('/admin/contact_submit', 'ContactController@save_contact');

});

Route::get('/', 'LandingController@index');
Route::get('/home', 'PageController@index');
Route::get('/gallery', 'PageController@gallery');
Route::get('/testimonials', 'PageController@testimonial');
Route::get('/clients', 'PageController@client');
Route::get('/about', 'PageController@about');
Route::get('/resources', 'PageController@resource');
Route::get('/contact', 'PageController@contact');
Route::get('/services', 'PageController@service');
Route::get('/services/category/{id}', 'PageController@service_subcategory');
Route::get('/services/subcategory/{id}', 'PageController@subcategory_details');
Route::post('/subcategory/contact_us', 'PageController@subcategory_contact');
Route::post('/subscription', 'PageController@subscription_add');
Route::post('/contact_us', 'PageController@contact_add');
Route::post('/quick_contact', 'PageController@quick_contact_add');





