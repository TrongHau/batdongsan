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

    // lấy tin batdongsan.com.vn

    Route::get('sync_article_for_lease/sync_article_for_lease', 'SyncArticleForLeaseController@getSyncArticle');
    Route::get('sync_article_for_lease/approval/{id}', 'SyncArticleForLeaseController@approvalSyncArticle');
    Route::post('sync_article_for_lease/sync_post_article', 'SyncArticleForLeaseController@storeSyncArticle');

    CRUD::resource('sync_article_for_lease', 'SyncArticleForLeaseController');

    Route::get('sync_article_for_buy/sync_article_for_buy', 'SyncArticleForBuyController@getSyncArticle');
    Route::get('sync_article_for_buy/approval/{id}', 'SyncArticleForBuyController@approvalSyncArticle');
    Route::post('sync_article_for_buy/sync_post_article', 'SyncArticleForBuyController@storeSyncArticle');

    CRUD::resource('sync_article_for_buy', 'SyncArticleForBuyController');

    // lấy tin chotot.com

    Route::get('sync_article_for_lease_chotot/sync_article_for_lease_chotot', 'SyncArticleForLeaseChototController@getSyncArticle');
    Route::get('sync_article_for_lease_chotot/approval/{id}', 'SyncArticleForLeaseChototController@approvalSyncArticle');
    Route::post('sync_article_for_lease_chotot/sync_post_article', 'SyncArticleForLeaseChototController@storeSyncArticle');

    CRUD::resource('sync_article_for_lease_chotot', 'SyncArticleForLeaseChototController');

    Route::get('sync_article_for_buy_chotot/sync_article_for_buy_chotot', 'SyncArticleForBuyChototController@getSyncArticle');
    Route::get('sync_article_for_buy_chotot/approval/{id}', 'SyncArticleForBuyChototController@approvalSyncArticle');
    Route::post('sync_article_for_buy_chotot/sync_post_article_chotot', 'SyncArticleForBuyChototController@storeSyncArticle');

    CRUD::resource('sync_article_for_buy_chotot', 'SyncArticleForBuyController');


}); // this should be the absolute last line of this file
