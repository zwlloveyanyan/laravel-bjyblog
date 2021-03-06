<?php

declare(strict_types=1);
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

Route::namespace('Auth')->prefix('auth')->as('auth.')->group(function () {
    Route::prefix('passport')->as('passport.')->middleware('auth:api')->group(function () {
        Route::post('logout', 'PassportController@logout')->name('logout');
    });
});

Route::prefix('dashboard')->as('dashboard.')->middleware('auth:api')->group(function () {
    Route::get('analysis', 'DashboardController@analysis')->name('analysis');
});

Route::namespace('Resources')->middleware('auth:api')->group(function () {
    Route::apiResource('categories', 'CategoryController');
    Route::patch('categories/{categorie}/restore', 'CategoryController@restore')->name('categories.restore');
    Route::delete('categories/{categorie}/forceDelete', 'CategoryController@forceDelete')->name('categories.forceDelete');

    Route::apiResource('tags', 'TagController');
    Route::patch('tags/{tag}/restore', 'TagController@restore')->name('tags.restore');
    Route::delete('tags/{tag}/forceDelete', 'TagController@forceDelete')->name('tags.forceDelete');

    Route::apiResource('articles', 'ArticleController');
    Route::patch('articles/{article}/restore', 'ArticleController@restore')->name('articles.restore');
    Route::delete('articles/{article}/forceDelete', 'ArticleController@forceDelete')->name('articles.forceDelete');

    Route::post('articleCover', 'ArticleCoverController@store')->name('articleCovers.store');

    Route::get('comments', 'CommentController@index')->name('comments.index');
    Route::get('comments/{comment}', 'CommentController@show')->name('comments.show');
    Route::put('comments/{comment}', 'CommentController@update')->name('comments.update');
    Route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.destroy');
    Route::patch('comments/{comment}/restore', 'CommentController@restore')->name('comments.restore');
    Route::delete('comments/{comment}/forceDelete', 'CommentController@forceDelete')->name('comments.forceDelete');

    Route::get('configs', 'ConfigController@index')->name('configs.index');
    Route::get('configs/{config}', 'ConfigController@show')->name('configs.show');
    Route::put('configs/{config}', 'ConfigController@update')->name('configs.update');
    Route::post('configs/uploadQqQunOrCode', 'ConfigController@uploadQqQunOrCode')->name('configs.uploadQqQunOrCode');

    Route::apiResource('friendshipLinks', 'FriendshipLinkController');
    Route::patch('friendshipLinks/{friendshipLink}/restore', 'FriendshipLinkController@restore')->name('friendshipLinks.restore');
    Route::delete('friendshipLinks/{friendshipLink}/forceDelete', 'FriendshipLinkController@forceDelete')->name('friendshipLinks.forceDelete');

    Route::apiResource('openSources', 'OpenSourceController');
    Route::patch('openSources/{openSource}/restore', 'OpenSourceController@restore')->name('openSources.restore');
    Route::delete('openSources/{openSource}/forceDelete', 'OpenSourceController@forceDelete')->name('openSources.forceDelete');

    Route::apiResource('navs', 'NavController');
    Route::patch('navs/{nav}/restore', 'NavController@restore')->name('navs.restore');
    Route::delete('navs/{nav}/forceDelete', 'NavController@forceDelete')->name('navs.forceDelete');

    Route::apiResource('notes', 'NoteController');
    Route::patch('notes/{note}/restore', 'NoteController@restore')->name('notes.restore');
    Route::delete('notes/{note}/forceDelete', 'NoteController@forceDelete')->name('notes.forceDelete');

    Route::apiResource('sites', 'SiteController');
    Route::patch('sites/{site}/restore', 'SiteController@restore')->name('sites.restore');
    Route::delete('sites/{site}/forceDelete', 'SiteController@forceDelete')->name('sites.forceDelete');

    Route::apiResource('socialiteClients', 'SocialiteClientController');

    Route::apiResource('socialiteUsers', 'SocialiteUserController');
    Route::patch('socialiteUsers/{socialiteUser}/restore', 'SocialiteUserController@restore')->name('socialiteUsers.restore');
    Route::delete('socialiteUsers/{socialiteUser}/forceDelete', 'SocialiteUserController@forceDelete')->name('socialiteUsers.forceDelete');

    Route::apiResource('users', 'UserController');
    Route::patch('users/{user}/restore', 'UserController@restore')->name('users.restore');
    Route::delete('users/{user}/forceDelete', 'UserController@forceDelete')->name('users.forceDelete');
});
