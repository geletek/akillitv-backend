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

Route::group(['namespace' => 'Category'], function () {

    Route::get('category/deactivated', 'CategoryStatusController@getDeactivated')->name('category.deactivated');
    Route::get('category/deleted', 'CategoryStatusController@getDeleted')->name('category.deleted');

    Route::resource('category', 'CategoryController');

    Route::group(['prefix' => 'category/{category}'], function () {

        Route::get('mark/{status}', 'CategoryStatusController@mark')->name('category.mark')->where(['status' => '[active,passive]']);
    });

    Route::group(['prefix' => 'category/{deletedCategory}'], function () {
        Route::get('delete', 'CategoryStatusController@delete')->name('category.delete-permanently');
        Route::get('restore', 'CategoryStatusController@restore')->name('category.restore');
    });
});
