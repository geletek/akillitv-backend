<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

//Route::resource('server', 'Server\ServerController');
//Route::get('server/deleted', 'Server\ServerStatusController@getDeleted')->name('server.deleted');
Route::group(['namespace' => 'Server'], function () {
    Route::get('server/deactivated', 'ServerStatusController@getDeactivated')->name('server.deactivated');
    Route::get('server/deleted', 'ServerStatusController@getDeleted')->name('server.deleted');
    Route::resource('server', 'ServerController');
});
