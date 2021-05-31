<?php

use Illuminate\Support\Facades\Route;

define('PAGINATION_COUNT',10);


Route::group(['namespace' => 'Admin' , 'middleware' => 'auth:Admin'],function(){
    Route::get('index','DashboardController@index') -> name('admin.dashboard');
    
    /**Begin Languages Routes */
    Route::group(['prefix'=>'languages'],function(){
        Route::get('/','LanguagesController@index')->name('admin.languages');
        Route::get('create','LanguagesController@create')->name('admin.languages.create');
        Route::post('store','LanguagesController@store')->name('admin.languages.store');

        Route::get('edit/{id}','LanguagesController@edit')->name('admin.languages.edit');
        Route::post('update/{id}','LanguagesController@update')->name('admin.languages.update');

        Route::get('delete/{id}','LanguagesController@destroy')->name('admin.languages.delete');
    });
    /**End Languages Routes */

    /**Begin Main Categorirs Routes */
    Route::group(['prefix'=>'main_categories'],function(){
        Route::get('/','MainCategoriesController@index')->name('admin.maincategories');
        Route::get('create','MainCategoriesController@create')->name('admin.maincategories.create');
        Route::post('store','MainCategoriesController@store')->name('admin.maincategories.store');

        Route::get('edit/{id}','MainCategoriesController@edit')->name('admin.maincategories.edit');
        Route::post('update/{id}','MainCategoriesController@update')->name('admin.maincategories.update');

        Route::get('delete/{id}','MainCategoriesController@destroy')->name('admin.maincategories.delete');
    });
    /**End Main Categorirs Routes */

    
});


// 1. get page 
// 2. post sent data to check database 
// guest:admin any one can visit this page guest like auth i must using same as name Admin from file auth in guard 

Route::group(['namespace' => 'Admin' , 'middleware' => 'guest:Admin'],function(){
    Route::get('Login', 'LoginController@getLogin')->name('get.login.admin');
    Route::post('Login', 'LoginController@postLogin')->name('admin.login');
    
});
