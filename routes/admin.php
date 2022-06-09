<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Config::set('auth.defines', 'admin');
    
    Route::get('login', 'adminAuth@login');
    Route::post('login', 'adminAuth@doValidate');
    
    Route::get('forgot/password', 'adminAuth@forgotPassword');
    Route::post('forgot/password', 'adminAuth@forgotPasswordPost');

    Route::get('reset/password/{token}', 'adminAuth@resetPassword');
    Route::post('reset/password/{token}', 'adminAuth@resetPasswordPost');

    
    Route::group(['middleware' => 'admin:admin'], function(){
        
        Route::resource('admin', 'adminController');
        
        Route::Delete('admin/destroy/all', 'adminController@multiDelete');

        Route::resource('users', 'usersController');
        
        Route::Delete('users/destroy/all', 'usersController@multiDelete');
        
        Route::get('/', function () {
            return view('admin.index');
        });

        //logout route that call logout func. in adminAuth controller
        Route::any('logout', 'adminAuth@logout');

        Route::get('lang/{lang}', function ($lang) {
            session()->has('lang')?session()->forget('lang'):'';
            $lang == 'ar'?session()->put('lang', 'ar'):session()->put('lang', 'en');
            return back();
        });
    }); 
});
