<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('/register', 'App\Http\Controllers\APIController@register');
Route::post('/login', 'App\Http\Controllers\APIController@login');


Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'App\Http\Controllers\APIController@logout');
    




    Route::get('workspaces', 'App\Http\Controllers\WorkspaceController@index');
    Route::get('workspaces/{id}', 'App\Http\Controllers\WorkspaceController@show');
    Route::post('workspaces', 'App\Http\Controllers\WorkspaceController@store');
    Route::put('workspaces/{id}', 'App\Http\Controllers\WorkspaceController@update');  
    Route::delete('workspaces/{id}', 'App\Http\Controllers\WorkspaceController@destroy');
    
    
    Route::get('channels', 'App\Http\Controllers\ChannelController@index');
    Route::get('channels/{id}', 'App\Http\Controllers\ChannelController@show');
    Route::post('channels', 'App\Http\Controllers\ChannelController@store');
    Route::put('channels/{id}', 'App\Http\Controllers\ChannelController@update');  
    Route::delete('channels/{id}', 'App\Http\Controllers\ChannelController@destroy');



    Route::get('messages/{idworkspace}/{idchannel}/get','App\Http\Controllers\MessagesController@fetch');
    Route::get('sendmessages','App\Http\Controllers\MessagesController@send');

});



