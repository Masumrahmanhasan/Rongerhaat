<?php

/*
|----------------------------------------------------------------------------------------------------------
|
|                                               Software Route
|
|----------------------------------------------------------------------------------------------------------
*/


/*==========================================================================================================
                                                    Software Auth
===========================================================================================================*/

// Route::get('/', 'Software\Auth\LoginCn@index')->name('/');
Route::get('admin', 'Software\Auth\LoginCn@index')->name('software.auth.login.index');

Route::group(['prefix' => 'software-auth', 'namespace' => 'Software', 'as' => 'software.'], function(){
    // Route::get('register', 'Auth\RegisterCn@store')->name('auth.register');
    Route::post('login', 'Auth\LoginCn@login')->name('auth.login');
    Route::post('logout', 'Auth\LogoutCn@logout')->name('auth.logout');
    Route::post('change/password', 'Auth\SecurityCn@changePassword')->name('auth.change.password');
});

Route::group(['prefix' => 'software/superadmin', 'namespace' => 'Software\SuperAdmin', 'as' => 'superadmin.', 'middleware' => 'sAuth'], function(){
    Route::get('dashboard', 'DashboardCn@index')->name('dashboard');

    /*==========================================================================================================
                                                        Setup
    ===========================================================================================================*/

    // Basic Manage
    Route::prefix('basic')->group(function(){
        Route::get('/', 'Setup\BasicCn@index')->name('basic.index');
        Route::get('create/{id?}', 'Setup\BasicCn@create')->name('basic.create');
        Route::post('store', 'Setup\BasicCn@store')->name('basic.store');
        Route::delete('destroy', 'Setup\BasicCn@destroy')->name('basic.destroy');
    });

    // Social Media
    Route::prefix('social')->group(function(){
        Route::get('/', 'Setup\SocialCn@index')->name('social.index');
        Route::get('create/{id?}', 'Setup\SocialCn@create')->name('social.create');
        Route::post('store', 'Setup\SocialCn@store')->name('social.store');
        Route::delete('destroy', 'Setup\SocialCn@destroy')->name('social.destroy');
    });

    /*==========================================================================================================
                                                        Category Manage
    ===========================================================================================================*/

    // Category
    Route::prefix('category')->group(function(){
        Route::get('/', 'Catm\CategoryCn@index')->name('category.index');
        Route::get('create/{id?}', 'Catm\CategoryCn@create')->name('category.create');
        Route::post('store', 'Catm\CategoryCn@store')->name('category.store');
        Route::delete('destroy', 'Catm\CategoryCn@destroy')->name('category.destroy');
    });

    // Sub-Category
    Route::prefix('sub-category')->group(function(){
        Route::get('/', 'Catm\SubCategoryCn@index')->name('sub.category.index');
        Route::get('create/{id?}', 'Catm\SubCategoryCn@create')->name('sub.category.create');
        Route::post('store', 'Catm\SubCategoryCn@store')->name('sub.category.store');
        Route::delete('destroy', 'Catm\SubCategoryCn@destroy')->name('sub.category.destroy');
    });

    /*==========================================================================================================
                                                        Brand Manage
    ===========================================================================================================*/

    // Brand
    Route::prefix('brand')->group(function(){
        Route::get('/', 'Brand\BrandCn@index')->name('brand.index');
        Route::get('create/{id?}', 'Brand\BrandCn@create')->name('brand.create');
        Route::post('store', 'Brand\BrandCn@store')->name('brand.store');
        Route::delete('destroy', 'Brand\BrandCn@destroy')->name('brand.destroy');
    });

    /*==========================================================================================================
                                                        Product Manage
    ===========================================================================================================*/

    // Product
    Route::prefix('product')->group(function(){
        Route::get('/', 'Product\ProductCn@index')->name('product.index');
        Route::get('create/{id?}', 'Product\ProductCn@create')->name('product.create');
        Route::post('store', 'Product\ProductCn@store')->name('product.store');
        Route::post('dropzone', 'Product\ProductCn@dropzone')->name('product.dropzone');
        Route::delete('destroy', 'Product\ProductCn@destroy')->name('product.destroy');
        Route::delete('image-destroy', 'Product\ProductCn@image_destroy')->name('product.image.destroy');
    });

    /*==========================================================================================================
                                                        Order Manage
    ===========================================================================================================*/

    // Order
    Route::prefix('order')->group(function(){
        Route::get('/', 'Order\OrderCn@index')->name('order.index');
        Route::get('details/{id?}', 'Order\OrderCn@details')->name('order.details');
        Route::get('action/{type}/{id}', 'Order\OrderCn@action')->name('order.action');
        Route::delete('destroy', 'Order\OrderCn@destroy')->name('order.destroy');
    });

    // Icon
    Route::prefix('icon')->group(function(){
        Route::get('/', 'Icon\IconCn@index')->name('icon.index');
    });
});