<?php

/*
 |--------------------------------------------------------------------------
 | Application Routes
 |--------------------------------------------------------------------------
 */

// Route model-binding: Binds the Models to a route name
Route::model('post', 'Post');
Route::model('user', 'User');
Route::model('comment', 'Comment');
Route::model('tag', 'Tag');

// Get home page
Route::get('/', array(
  'as' => 'home',
  function() {
    $posts = Post::all() -> reverse();
    return View::make('home', compact('posts'));
  }

));

// Get contact page
Route::get('contact', array(
  'as' => 'contact',
  function() {
    return View::make('contact');
  }

));
// POST from contact page
Route::post('contact', 'ContactController@send');

// Get a single post's page
Route::get('post/{post}', array(
  'before' => 'premium',
  'as' => 'showPost',
  'uses' => 'PostController@show'
));

// Get a list of all posts under a single tag
Route::get('tag/{tag}', array(
  'as' => 'showTag',
  'uses' => 'TagController@show'
));

// Get a list of all posts under a single author
Route::get('user/{user}', array(
  'as' => 'showUser',
  'uses' => 'UserController@showPosts'
));

// Must not be logged in to access these routes
Route::group(array('before' => 'guest'), function() {

  // Get the login page
  Route::get('login', array(
    'as' => 'login',
    'uses' => 'UserController@showLogin'
  ));

  // POST from login page
  Route::post('login', 'UserController@login');

  // Get the register page
  Route::get('register', array(
    'as' => 'register',
    'uses' => 'UserController@showRegister'
  ));

  // POST from register page
  Route::post('register', 'UserController@register');
});

// Must be logged in before accessing these routes
Route::group(array('before' => 'auth'), function() {

  // Get the logout action
  Route::get('logout', array(
    'as' => 'logout',
    'uses' => 'UserController@logout'
  ));

  // POST from a comment form
  Route::post('comment', 'CommentController@save');

  // Must have a standard user role before accessing these routes
  Route::group(array('before' => 'standard'), function() {

    // Get the premium page
    Route::get('premium', array(
      'as' => 'premium',
      function() {
        return View::make('premium');
      }

    ));

    // POST from premium page
    Route::post('premium', array(
      'as' => 'premium',
      'uses' => 'CreditCardController@save'
    ));
  });

  // Must have an admin user role before accessing these routes
  Route::group(array('before' => 'admin'), function() {

    // Route prefix of admin
    Route::group(array('prefix' => 'admin'), function() {

      // Route prefix of post
      Route::group(array('prefix' => 'post'), function() {

        // Get create post page
        Route::get('create', array(
          'as' => 'createPost',
          function() {
            return View::make('admin.post.create');
          }

        ));

        // POST from create post page
        Route::post('create', 'PostController@save');

        // Get edit post page
        Route::get('edit/{post}', array(
          'as' => 'editPost',
          'uses' => 'PostController@edit'
        ));

        // POST from edit post page
        Route::post('edit/{post}', array(
          'as' => 'editPost',
          'uses' => 'PostController@save'
        ));

        // Get delete post page
        Route::get('delete/{post}', array(
          'as' => 'deletePost',
          'uses' => 'PostController@showDelete'
        ));

        // POST from delete post page
        Route::post('delete/{post}', array(
          'as' => 'deletePost',
          'uses' => 'PostController@delete'
        ));
      });

      // Route prefix of user
      Route::group(array('prefix' => 'user'), function() {

        // Get create user page
        Route::get('create', array(
          'as' => 'createUser',
          function() {
            return View::make('admin.user.create');
          }

        ));

        // POST from create user page
        Route::post('create', 'UserController@create');

        // Get edit user page
        Route::get('edit/{user}', array(
          'as' => 'editUser',
          'uses' => 'UserController@edit'
        ));

        // POST from edit user page
        Route::post('edit/{user}', array(
          'as' => 'editUser',
          'uses' => 'UserController@save'
        ));

        // Get delete post page
        Route::get('delete/{user}', array(
          'as' => 'deleteUser',
          'uses' => 'UserController@showDelete'
        ));

        // POST from delete post page
        Route::post('delete/{user}', array(
          'as' => 'deleteUser',
          'uses' => 'UserController@delete'
        ));
      });

      // Route prefix of comment
      Route::group(array('prefix' => 'comment'), function() {

        // Get delete comment page
        Route::get('delete/{comment}', array(
          'as' => 'deleteComment',
          'uses' => 'CommentController@showDelete'
        ));

        // POST from delete comment page
        Route::post('delete/{comment}', array(
          'as' => 'deleteComment',
          'uses' => 'CommentController@delete'
        ));
      });

      // Moderate posts
      Route::get('posts', array(
        'as' => 'modPosts',
        'uses' => 'PostController@listPosts'
      ));

      // Moderate Users
      Route::get('users', array(
        'as' => 'modUsers',
        'uses' => 'UserController@listUsers'
      ));
    });
  });
});
