<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('article_for_lease', 'ArticleForLeaseController');
    CRUD::resource('article_for_buy', 'ArticleForBuyController');
    CRUD::resource('phone', 'PhoneController');
    CRUD::resource('report', 'ReportController');

    Route::get('sync_article/sync_article', 'SyncArticleController@getSyncArticle');
    Route::get('sync_article/approval/{id}', 'SyncArticleController@approvalSyncArticle');
    Route::post('sync_article/sync_post_article', 'SyncArticleController@storeSyncArticle');

    CRUD::resource('sync_article', 'SyncArticleController');




}); // this should be the absolute last line of this file
