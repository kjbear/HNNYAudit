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

// \Debugbar::disable();

Route::post('/sitescope/xml/{environment}', 'SiteScopeController@storeXML');

Route::get('/override/disk/getHTML', 'Override\DiskController@getHTML');
Route::get('/override/disk/{host}', 'Override\DiskController@check');
