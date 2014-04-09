<?php

/*
 |--------------------------------------------------------------------------
 | Application Routes
 |--------------------------------------------------------------------------
 |
 | Here is where you can register all of the routes for an application.
 | It's a breeze. Simply tell Laravel the URIs it should respond to
 | and give it the Closure to execute when that URI is requested.
 |
 */

Route::get('/', array(
	'as' => 'home',
	function() {
		return View::make('home');
	}

));

Route::get('basics', function() {
	return View::make('basics');
});

Route::get('html', function() {
	return View::make('html');
});

Route::get('css', function() {
	return View::make('css');
});

Route::get('contact', function() {
	return View::make('contact');
});

Route::group(array('before' => 'guest'), function() {
	Route::get('login', array(
		'as' => 'login',
		'uses' => 'UserController@showLogin'
	));
	
	Route::post('login', 'UserController@login');
	
	Route::get('register', array(
		'as' => 'register',
		'uses' => 'UserController@showRegister'
	));
	
	Route::post('register', 'UserController@register');
});

Route::model('post', 'Post');
Route::get('show/{post}', array('as' => 'showPost', 'uses' => 'PostController@show'));

Route::group(array('before' => 'auth'), function() {
	Route::get('logout', array(
		'as' => 'logout',
		'uses' => 'UserController@logout'
	));
	Route::group(array('before' => 'admin'), function() {
		Route::get('post/create', array('as' => 'create', function() {
			return View::make('posts.create');
		}));

		Route::post('post/create', 'PostController@create');

		Route::get('post/edit/{post}', function() {
			return View::make('posts.edit');
		});

		Route::post('post/edit', 'PostController@save');
	});
});
