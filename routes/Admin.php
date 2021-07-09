<?php

use Illuminate\Support\Facades\Route;

define('PAGINATION_COUNT',10);


Route::group(['namespace' => 'Admin' , 'middleware' => 'auth:Admin'],function(){
    Route::get('index','DashboardController@index') -> name('admin.dashboard');
    Route::get('logout','DashboardController@logout')->name('admin.logout');
    
    /** Begin Languages Routes */
    Route::group(['prefix'=>'languages'],function(){
        Route::get('/','LanguagesController@index')->name('admin.languages');
        Route::get('create','LanguagesController@create')->name('admin.languages.create');
        Route::post('store','LanguagesController@store')->name('admin.languages.store');

        Route::get('edit/{id}','LanguagesController@edit')->name('admin.languages.edit');
        Route::post('update/{id}','LanguagesController@update')->name('admin.languages.update');

        Route::get('delete/{id}','LanguagesController@destroy')->name('admin.languages.delete');
    });
    /** End Languages Routes */

    /** Begin Main Categorirs Routes */
    Route::group(['prefix'=>'main_categories'],function(){
        Route::get('/','MainCategoriesController@index')->name('admin.maincategories');
        Route::get('create','MainCategoriesController@create')->name('admin.maincategories.create');
        Route::post('store','MainCategoriesController@store')->name('admin.maincategories.store');

        Route::get('edit/{id}','MainCategoriesController@edit')->name('admin.maincategories.edit');
        Route::post('update/{id}','MainCategoriesController@update')->name('admin.maincategories.update');

        Route::get('delete/{id}','MainCategoriesController@destroy')->name('admin.maincategories.delete');
        Route::get('changeStatus/{id}','MainCategoriesController@changeStatus')->name('admin.maincategories.status');
    });
    /** End Main Categorirs Routes */

    /** Begin Main vendors Routes */
    Route::group(['prefix'=>'vendors'],function(){
        Route::get('/','VendorsController@index')->name('admin.vendors');
        Route::get('create','VendorsController@create')->name('admin.vendors.create');
        Route::post('store','VendorsController@store')->name('admin.vendors.store');

        Route::get('edit/{id}','VendorsController@edit')->name('admin.vendors.edit');
        Route::post('update/{id}','VendorsController@update')->name('admin.vendors.update');

        Route::get('delete/{id}','VendorsController@destroy')->name('admin.vendors.delete');
        Route::get('changeStatus/{id}','VendorsController@changeStatus')->name('admin.vendors.status');

    });
    /** End Main vendors Routes */
    
    /** Begin subcategories Routes */
    Route::group(['prefix'=>'SubCategories'],function(){
        Route::get('/','SubCategoriesController@index')->name('admin.subcategories');
        Route::get('create','SubCategoriesController@create')->name('admin.subcategories.create');
        Route::post('store','SubCategoriesController@store')->name('admin.subcategories.store');

        Route::get('edit/{id}','SubCategoriesController@edit')->name('admin.subcategories.edit');
        Route::post('update/{id}','SubCategoriesController@update')->name('admin.subcategories.update');

        Route::get('delete/{id}','SubCategoriesController@destroy')->name('admin.subcategories.delete');
        Route::get('changeStatus/{id}','SubCategoriesController@changeStatus')->name('admin.subcategories.status');

    });
    /** End Main subcategories Routes */
});


Route::group(['namespace' => 'Admin' , 'middleware' => 'guest:Admin'],function(){
    Route::get('Login', 'LoginController@getLogin')->name('get.login.admin');
    Route::post('Login', 'LoginController@postLogin')->name('admin.login');
    
});
