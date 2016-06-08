<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the API routes for your application as
| the routes are automatically authenticated using the API guard and
| loaded automatically by this application's RouteServiceProvider.
|
*/

Route::group([
    'prefix' => 'api',
    //'middleware' => 'auth:api'
], function () {
	Route::resource('promotions', 'Api\PromotionFeedController');
	Route::resource('promotion', 'Api\PromtionController');
	Route::resource('tracking', 'Api\PromotionTrackingController');
	Route::resource('proposal', 'Api\ProposalController');
	Route::resource('thread', 'Api\ThreadController');
	Route::resource('payment', 'Api\PaymentController');
	Route::resource('payout', 'Api\PayoutController');
});
