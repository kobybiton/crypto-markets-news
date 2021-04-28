<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Redirect

Route::get('article/profile/{old_id}/{title}', 'PagesController@redirect');

// Cms //

// Articles
Route::get( 'cms', [ 'uses' => 'CmsController@articleForm' ] );
Route::post( 'cms', [ 'as'   => 'cms', 'uses' => 'CmsController@storeArticle' ] );
Route::get( 'cms/update-article/{id}', [ 'uses' => 'CmsController@updateArticleForm' ] );
Route::get( 'cms/articles', [ 'uses' => 'CmsController@articles' ] );
Route::delete( 'cms/archive-article/{id}', [ 'uses' => 'CmsController@destroyArticle' ] );
Route::get( 'cms/archived-articles', [ 'uses' => 'CmsController@archivedArticles' ] );
Route::post( 'cms/restore-article/{id}', [ 'uses' => 'CmsController@restoreArticle' ] );

// Banners
Route::get( 'cms/banner-form', [ 'uses' => 'CmsController@bannerForm' ] );
Route::post( 'cms/store-banner', [ 'as'   => 'cms/store-banner', 'uses' => 'CmsController@storeBanner' ] );
Route::get( 'cms/update-banner/{id}', [ 'uses' => 'CmsController@updateBannerForm' ] );
Route::post( 'cms/sort-banner/{id}', [ 'uses' => 'CmsController@sortBanners' ] );
Route::get( 'cms/banners', [ 'uses' => 'CmsController@banners' ] );
Route::delete( 'cms/archive-banner/{id}', [ 'uses' => 'CmsController@destroyBanner' ] );
Route::get( 'cms/archived-banners', [ 'uses' => 'CmsController@archivedBanners' ] );
Route::post( 'cms/restore-banner/{id}', [ 'uses' => 'CmsController@restoreBanner' ] );

// Category
Route::get( 'cms/category-form', [ 'uses' => 'CmsController@categoryForm' ] );
Route::get( 'cms/update-category/{id}', [ 'uses' => 'CmsController@updateCategoryForm' ] );
Route::post( 'cms/store-category', [ 'as'   => 'cms/store-category', 'uses' => 'CmsController@storeCategories' ] );
Route::get( 'cms/categories', [ 'uses' => 'CmsController@categories' ] );
Route::get( 'cms/archived-categories', [ 'uses' => 'CmsController@archivedCategories' ] );
Route::delete( 'cms/archive-category/{id}', [ 'uses' => 'CmsController@destroyCategories' ] );
Route::post( 'cms/restore-category/{id}', [ 'uses' => 'CmsController@restoreCategories' ] );

// Tags
Route::get( 'cms/tag-form', [ 'uses' => 'CmsController@tagsForm' ] );
Route::post( 'cms/store-tag', [ 'as'   => 'cms/store-tag', 'uses' => 'CmsController@storeTag' ] );
Route::get( 'cms/update-tag/{id}', [ 'uses' => 'CmsController@updateTagForm' ] );
Route::get( 'cms/tags', [ 'uses' => 'CmsController@tags' ] );
Route::delete( 'cms/archive-tag/{id}', [ 'uses' => 'CmsController@destroyTag' ] );
Route::get( 'cms/archived-tags', [ 'uses' => 'CmsController@archivedTags' ] );
Route::post( 'cms/restore-tag/{id}', [ 'uses' => 'CmsController@restoreTag' ] );

Route::get( 'cms/comments', [ 'uses' => 'CmsController@comments' ] );
Route::post( 'cms/comments/update-status', [ 'uses' => 'CmsController@updateCommentsStatus' ] );

// Ajax
Route::get( '/coin-list', 'AjaxController@cionListDetails' );
Route::post( '/store-comment', 'AjaxController@storeComment' );
Route::post( '/store-delivery-mail', 'AjaxController@storeDeliveryMail' );

Auth::routes(['register' => false]);

// Currency
Route::get( 'ticker/updates', function () {

    //Log::debug( '==1==ticker/updates======' );

    return view( 'components.market_cap' );
} )->name( 'ticker.updates' );
Route::get( 'currency', [ 'uses' => 'CurrencyController@updateCurrenciesBySelectedCoin' ] );
Route::get( 'interval-currency', [ 'as'   => 'interval-currency', 'uses' => 'CurrencyController@updateCurrenciesByCoin' ] );

// Pages

Route::get( '/', 'PagesController@index' );
Route::get( '/market-cap', 'PagesController@marketCap' );
Route::get( '/article', 'PagesController@article' );
Route::get( '/coin-info', 'PagesController@coinInfo' );
Route::get( '/about-us', 'PagesController@aboutUs' );
Route::get( '/privacy-policy', 'PagesController@privacyPolicy' );
Route::get( '/terms-of-service', 'PagesController@termsOfService' );
Route::get( '/cookie-policy', 'PagesController@cookiePolicy' );
Route::get( '/advertise', 'PagesController@advertise' );
Route::get('{category}', 'PagesController@articles');
Route::get('{category}/{article}/{id}', 'PagesController@article');


