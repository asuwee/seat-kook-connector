<?php


Route::group([
    'namespace' => 'asuwee\Seat\Connector\Drivers\KOOK\Http\Controllers',
    'prefix' => 'seat-connector',
    'middleware' => ['web', 'auth', 'locale'],
], function(){

    Route::group([
        'prefix' => 'registration',
    ], function(){

        Route::get('/kook', [
            'as' => 'seat-connector.drivers.kook.registration',
            'uses' => 'RegistrationController@redirectToProvider'
        ]);

        Route::post('/kook', [
            'as' => 'seat-connector.drivers.kook.registration.submit',
            'uses' => 'RegistrationController@handlerSubmit',
        ]);
        
    });


    Route::group([
        'prefix' => 'settings',
        'middleware' => 'can:global.superuser',
    ], function(){ 

        Route::post('/kook', [
            'as' => 'seat-connector.drivers.kook.settings',
            'uses' => 'SettingsController@store',
        ]);

        Route::get('/kook/callback', [
            'as' => 'seat-connector.drivers.kook.settings.callback',
            'uses' => 'SettingsController@handleProviderCallback',
        ]);
    });


});