<?php

/**
 * All route names are prefixed with 'admin.video'.
 */
Route::group([
    'prefix'     => 'video',
    'as'         => 'video.',
    'namespace'  => 'Video',
], function () {
    Route::group([
        'middleware' => 'role:administrator',
    ], function () {

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
    });

    Route::group(['namespace' => 'Video'], function () {

          Route::get('video/deactivated', 'VideoStatusController@getDeactivated')->name('video.deactivated');
          Route::get('video/deleted', 'VideoStatusController@getDeleted')->name('video.deleted');

          Route::resource('video', 'VideoController');

          Route::group(['prefix' => 'video/{video}'], function () {

              Route::get('mark/{status}', 'VideoStatusController@mark')->name('video.mark')->where(['status' => '[active,passive]']);
          });

          Route::group(['prefix' => 'video/{deletedCategory}'], function () {
              Route::get('delete', 'VideoStatusController@delete')->name('video.delete-permanently');
              Route::get('restore', 'VideoStatusController@restore')->name('video.restore');
          });
      });






});
