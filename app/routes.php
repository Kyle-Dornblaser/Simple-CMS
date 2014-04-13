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

Route::model('post', 'Post');
Route::model('user', 'User');

Route::get('/', array('as' => 'home', function() {
	$posts = Post::all() -> reverse();
	return View::make('home', compact('posts'));
}));

Route::get('contact', function() {
	return View::make('contact');
});

Route::get('post/{post}', array('before' => 'premium', 'as' => 'showPost', 'uses' => 'PostController@show'));

Route::group(array('before' => 'guest'), function() {
	Route::get('login', array('as' => 'login', 'uses' => 'UserController@showLogin'));

	Route::post('login', 'UserController@login');

	Route::get('register', array('as' => 'register', 'uses' => 'UserController@showRegister'));

	Route::post('register', 'UserController@register');
});

Route::group(array('before' => 'auth'), function() {
	Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logout'));

	Route::group(array('before' => 'standard'), function() {
		Route::get('premium', array('as' => 'premium', function() {
			return View::make('premium');
		}));
		Route::post('premium', array('as' => 'premium', 'uses' => 'CreditCardController@save'));
	});

	Route::group(array('before' => 'admin'), function() {
		Route::group(array('prefix' => 'admin'), function() {
			Route::group(array('prefix' => 'post'), function() {
				Route::get('create', array('as' => 'createPost', function() {
					return View::make('admin.post.create');
				}));

				Route::post('create', 'PostController@save');

				Route::get('edit/{post}', array('as' => 'editPost', 'uses' => 'PostController@edit'));

				Route::post('edit/{post}', array('as' => 'editPost', 'uses' => 'PostController@save'));

				Route::get('delete/{post}', array('as' => 'deletePost', 'uses' => 'PostController@showDelete'));

				Route::post('delete/{post}', array('as' => 'deletePost', 'uses' => 'PostController@delete'));
			});

			Route::group(array('prefix' => 'user'), function() {
				Route::get('create', array('as' => 'createUser', function() {
					return View::make('admin.user.create');
				}));

				Route::post('create', 'UserController@create');

				Route::get('edit/{user}', array('as' => 'editUser', 'uses' => 'UserController@edit'));

				Route::post('edit/{user}', array('as' => 'editUser', 'uses' => 'UserController@save'));

				Route::get('delete/{user}', array('as' => 'deleteUser', 'uses' => 'UserController@showDelete'));

				Route::post('delete/{user}', array('as' => 'deleteUser', 'uses' => 'UserController@delete'));
			});

			Route::get('posts', array('as' => 'modPosts', 'uses' => 'PostController@listPosts'));

			Route::get('users', array('as' => 'modUsers', 'uses' => 'UserController@listUsers'));
		});
	});
});
