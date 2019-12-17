<?php

/*
|--------------------------------------------------------------------------
|
| All Routes
|
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cache:clear',function(){
  Artisan::call('cache:clear');
  return 'cache:clear';
});

Route::get('/view:clear',function(){
   Artisan::call('view:clear');
   return 'view:clear';
});
Route::get('/config:cache',function(){
   Artisan::call('config:cache');
   return 'config:cache';
});
Route::get('/route:clear',function(){
   Artisan::call('route:clear');
   return 'route:clear';
});

Route::group(['as' => 'web.'], function(){
    Route::get('/', 'Web\HomeCn@index')->name('home');
    Route::get('product/{id}', 'Web\ProductCn@details')->name('product.details');
    Route::get('/search', 'Web\SearchController@search')->name('search.action');
    
    /*==========================================================================================================
                                                    User Auth
    ===========================================================================================================*/

    // Route::get('login', 'Web\Auth\LoginCn@index')->name('user.auth.login.index');
    // Route::get('register', 'Web\Auth\RegisterCn@index')->name('user.auth.register.index');
    
    Route::group(['prefix' => 'user-auth', 'namespace' => 'Web', 'as' => 'user.'], function(){
        Route::post('register', 'Auth\RegisterCn@store')->name('auth.register');
        Route::get('email-verification/{token}', 'Auth\VerifyCn@email_verification')->name('auth.email.verification');

        Route::post('login', 'Auth\LoginCn@login')->name('auth.login');
        Route::post('logout', 'Auth\LogoutCn@logout')->name('auth.logout');
        Route::post('change/password', 'Auth\SecurityCn@changePassword')->name('auth.change.password');
    });

    /*==========================================================================================================
                                                    User Panel
    ===========================================================================================================*/
    Route::group(['prefix' => 'user', 'namespace' => 'Web', 'as' => 'user.', 'middleware' => 'wAuth'], function(){
        Route::get('dashboard', 'User\DashboardCn@index')->name('dashboard');

        // API
        Route::get('paypal-success', 'User\OrderCn@success')->name('paypal.success');
        Route::get('paypal-cancel', 'User\OrderCn@cancel')->name('paypal.cancel');

        // Profile
        Route::prefix('profile')->group(function(){
            Route::get('/', 'User\ProfileCn@index')->name('profile.index');
            Route::get('create/{id?}', 'User\ProfileCn@create')->name('profile.create');
            Route::post('store', 'User\ProfileCn@store')->name('profile.store');
            Route::delete('destroy', 'User\ProfileCn@destroy')->name('profile.destroy');
        });

        // Address Book
        Route::prefix('address-book')->group(function(){
            Route::get('/', 'User\AddressBookCn@index')->name('address.book.index');
            Route::get('create/{id?}', 'User\AddressBookCn@create')->name('address.book.create');
            Route::post('store', 'User\AddressBookCn@store')->name('address.book.store');
            Route::delete('destroy', 'User\AddressBookCn@destroy')->name('address.book.destroy');
        });

        // Cart
        Route::prefix('cart')->group(function(){
            Route::get('/', 'User\CartCn@index')->name('cart.index');
            Route::post('store', 'User\CartCn@store')->name('cart.store');
            Route::post('update', 'User\CartCn@update')->name('cart.update');
            Route::delete('destroy', 'User\CartCn@destroy')->name('cart.destroy');
        });

        // Order
        Route::prefix('order')->group(function(){
            Route::get('/', 'User\OrderCn@index')->name('order.index');
            Route::get('list', 'User\OrderCn@list')->name('order.list');
            Route::get('details/{id}', 'User\OrderCn@details')->name('order.details');

            Route::post('addinfo', 'User\OrderCn@addInfo')->name('order.addinfo');
            Route::get('preview', 'User\OrderCn@preview')->name('order.preview');
            Route::post('store', 'User\OrderCn@store')->name('order.store');
            Route::post('update', 'User\OrderCn@update')->name('order.update');
            Route::delete('destroy', 'User\OrderCn@destroy')->name('order.destroy');
        });
    });

});

