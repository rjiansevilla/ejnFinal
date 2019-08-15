<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('Api')->group(function(){
	Route::group(['middleware' => 'cors'], function(){
		//this will pull the records get
		

		//for form submit or form trigger
		

		//this middleware will help you protect the data from displaying into public
		Route::group(['middleware' => 'jwt.verify'], function(){

			Route::get("get-purchased-numbers",	[
				"as" => "get-purchased-numbers",
				"uses" => 'TwilioApiController@getPurchasedNumbers'
			])->name('get-purchased-numbers');
			
		});
	});

});

