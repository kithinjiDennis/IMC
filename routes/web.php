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

//~ Route::get('/', function () {
    //~ return view('welcome');
//~ });

Auth::routes();
Route::get('/{lang?}', 'HomeController@index')->name('home');
Route::get('/page/{slug}/{lang?}', 'HomeController@pages');
//Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('ADMIN')->group(function () {

    Route::post('users/forgot-password', 'UserController@forgotPassword');
    Route::get('users/reset-password/{token}', 'UserController@resetPassword');
    Route::post('users/reset-password-submit', 'UserController@resetPasswordSubmit');

});

Route::group(['middleware' => ['auth']], function () {
    Route::namespace('ADMIN')->prefix('admin')->group(function () {

        Route::get('dashboard', 'UserController@dashboard');
        Route::get('topmenu/list/{id?}', 'ComponentController@topmenu_list');
        Route::post('topmenu/create', 'ComponentController@topmenu_create');
        Route::post('topmenu/delete', 'ComponentController@topmenu_delete');
        Route::post('topmenu/update-menu-order', 'ComponentController@updateTopmenuOrder');

        Route::get('middlemenu/list/{id?}', 'ComponentController@middlemenu_list');
        Route::post('middlemenu/create', 'ComponentController@middlemenu_create');
        Route::post('middlemenu/delete', 'ComponentController@middlemenu_delete');
        Route::post('middlemenu/update-menu-order', 'ComponentController@updateMiddlemenuOrder');

        Route::get('mainmenu/list/{id?}/{type?}/{submenuid?}', 'ComponentController@mainmenu_list');
        Route::post('mainmenu/create', 'ComponentController@mainmenu_create');
        Route::post('mainmenu/delete', 'ComponentController@mainmenu_delete');
        Route::post('mainmenu/update-menu-order', 'ComponentController@updateMainmenuOrder');

         // Main footer

         Route::get('mainfooter/list/{id?}/{type?}/{submenuid?}', 'ComponentController@mainfooter_list');
         Route::post('mainfooter/create', 'ComponentController@mainfooter_create');
         Route::post('mainfooter/delete', 'ComponentController@mainfooter_delete');
         Route::post('mainfooter/update-footer-order', 'ComponentController@updateFooterOrder');




         Route::get('footer1/list/{id?}/{type?}/{submenuid?}', 'ComponentController@footer1_list');
         Route::post('footer1/create', 'ComponentController@footer1_create');
         Route::post('footer1/delete', 'ComponentController@footer1_delete');
         Route::post('footer1/update-footer1-order', 'ComponentController@updateFooter1Order');


         Route::get('footer2/list/{id?}', 'ComponentController@footer2_list');
         Route::post('footer2/create', 'ComponentController@footer2_create');


    });
Route::namespace('ADMIN')->group(function () {
  // enable or disable the sections

  Route::get('sections/list', 'SettingController@section_list');
  Route::post('sections/updatemultiplee', 'SettingController@updatemultiple');
  Route::post('sections/disablemultiple', 'SettingController@disablemultiple');
  Route::post('sections/updatesingle', 'SettingController@updatesingle');


    // Chnage logo

        Route::get('settings/logo/{id?}', 'SettingController@logo_list');
        Route::post('settings/logoupdate', 'SettingController@logoupdate');
       // Follow us
       Route::get('follow/list/{id?}', 'SettingController@follow_list');
       Route::post('follow/create', 'SettingController@follow_create');
       // Contact us
       Route::get('contact/list/{id}', 'SettingController@contact_list');
       Route::post('contact/create', 'SettingController@contact_create');
       // news heading update

       Route::get('heading/list', 'NewsController@heading_list');
       Route::post('heading/create', 'NewsController@heading_create');

 // this is for health tips
     Route::get('health/listing', 'HealthController@listing');
     Route::get('health/create', 'HealthController@create');
     Route::get('health/edit/{id}', 'HealthController@editPage');
     Route::post('health/store', 'HealthController@store');
     Route::post('health/delete-single-page', 'HealthController@deleteSinglePage');
     Route::post('health/delete-multiple-pages', 'HealthController@deleteMultiplePages');
     // route for the news
     Route::get('news/listing', 'NewsController@listing');
     Route::get('news/create', 'NewsController@create');
     Route::get('news/edit/{id}', 'NewsController@editPage');
     Route::post('news/store', 'NewsController@store');
     Route::post('news/delete-single-page', 'NewsController@deleteSinglePage');
     Route::post('news/delete-multiple-pages', 'NewsController@deleteMultiplePages');

     // route for the awards
     Route::get('awards/listing', 'AwardController@listing');
     Route::get('awards/create', 'AwardController@create');
     Route::get('awards/edit/{id}', 'AwardController@editPage');
     Route::post('awards/store', 'AwardController@store');
     Route::post('awards/delete-single-page', 'AwardController@deleteSinglePage');
     Route::post('awards/delete-multiple-pages', 'AwardController@deleteMultiplePages');
     // affiliates

     Route::get('affiliates/listing', 'AffiliateController@listing');
     Route::get('affiliates/create', 'AffiliateController@create');
     Route::get('affiliates/edit/{id}', 'AffiliateController@editPage');
     Route::post('affiliates/store', 'AffiliateController@store');
     Route::post('affiliates/delete-single-page', 'AffiliateController@deleteSinglePage');
     Route::post('affiliates/delete-multiple-pages', 'AffiliateController@deleteMultiplePages');


    /*User Module routes*/
    Route::get('users/create', 'UserController@create');
    Route::post('users/store', 'UserController@store');
    Route::get('users/listing', 'UserController@listing');

    Route::post('users/change-status', 'UserController@changeStatus');
    Route::get('users/edit/{id}', 'UserController@editUser');
    Route::post('users/save-edit-user', 'UserController@SaveEditUser');

    Route::post('users/delete-multiple-users', 'UserController@deleteMultiple');
    Route::post('users/update-multi-users-status', 'UserController@updateMultiUserStatus');
    Route::post('users/delete-single-user', 'UserController@deleteSingleUser');

    Route::get('users/change-password', 'UserController@ChangePassword');
    Route::post('users/change-password-submit', 'UserController@ChangePasswordSubmit');
     Route::post('users/lg', 'UserController@logout');
     /*end user Module routes*/

    /*Pages Module routes*/
    Route::get('pages/create', 'PageController@create');
    Route::post('pages/store', 'PageController@store');
    Route::get('pages/listing', 'PageController@listing');

    Route::get('pages/edit/{id}', 'PageController@editPage');
    Route::post('pages/delete-multiple-pages', 'PageController@deleteMultiplePages');
    Route::post('pages/delete-single-page', 'PageController@deleteSinglePage');
    /*end pages Module routes*/

    /*Menue Module routes*/

    Route::get('menu/create', 'MenuController@create');
    Route::post('menu/store', 'MenuController@store');
    Route::get('menu/listing', 'MenuController@listing');

    Route::get('menu/edit-menu/{id}', 'MenuController@editMenu');
    Route::post('menu/delete-menu', 'MenuController@deleteSingleMenu');
    Route::post('menu/delete-multiple-menu', 'MenuController@deleteMultipleMenu');

    Route::get('menu/add-sub-menu', 'MenuController@createSubMenu');
    Route::post('menu/store-sub-menu', 'MenuController@storeSubMenu');
    Route::get('menu/menu-details/{id}', 'MenuController@menuDetails');

    Route::get('menu/edit-sub-menu/{id}', 'MenuController@editSubMenu');

    Route::post('menu/delete-sub-menu', 'MenuController@deleteSingleSubMenu');
    Route::post('menu/delete-multiple-sub-menu', 'MenuController@deleteMultipleSubMenu');
    Route::post('menu/update-menu-order', 'MenuController@updateMenuOrder');

    /*end menu Module routes*/

});
});
