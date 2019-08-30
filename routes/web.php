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

    });
Route::namespace('ADMIN')->group(function () {

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

