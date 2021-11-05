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

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});


Route::apiResource('question', 'QuestionController');
Route::apiResource('category', 'CategoryController');
Route::apiResource('question.reply', 'ReplyController');

Route::post('/like/reply/{reply}', 'LikeController@likeReply')->name('like');
Route::delete('/like/reply/{reply}', 'LikeController@dislikeReply')->name('dislike');

Route::group([
  'prefix' => 'auth'
], function () {
  Route::post('register', 'AuthController@register');
  Route::post('login', 'AuthController@login');
  Route::post('logout', 'AuthController@logout');
  Route::post('refresh', 'AuthController@refresh');
  Route::post('me', 'AuthController@me');
});
