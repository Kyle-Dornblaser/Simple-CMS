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

Route::get('/', array('as' => 'home', function() {
	$posts = Post::all() -> reverse();
		return View::make('home', compact('posts'));
}));

Route::get('contact', function() {
	return View::make('contact');
});

Route::model('post', 'Post');
Route::get('post/{post}', array('as' => 'showPost', 'uses' => 'PostController@show'));

Route::group(array('before' => 'guest'), function() {
	Route::get('login', array('as' => 'login', 'uses' => 'UserController@showLogin'));

	Route::post('login', 'UserController@login');

	Route::get('register', array('as' => 'register', 'uses' => 'UserController@showRegister'));

	Route::post('register', 'UserController@register');
});

Route::group(array('before' => 'auth'), function() {
	Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logout'));
	Route::group(array('before' => 'admin'), function() {
		Route::get('admin/post/create', array('as' => 'create', function() {
			return View::make('admin.post.create');
		}));

		Route::post('admin/post/create', 'PostController@create');

		Route::get('admin/post/edit/{post}', array('as' => 'editPost', 'uses' => 'PostController@edit'));

		Route::post('admin/post/edit/{post}', array('as' => 'editPost', 'uses'=> 'PostController@save'));

		Route::get('admin/posts', array('as' => 'postAdmin', 'uses' => 'PostController@listPosts'));

		Route::get('admin/users', array('as' => 'userList', 'uses' => 'UserController@listUsers'));
	});
});
