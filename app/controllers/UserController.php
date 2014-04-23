<?php

/*
 * This is the controller for the User model.
 *
 */

class UserController extends BaseController {

	// Create login view
	public function showLogin() {
		return View::make('auth.login');
	}

	// Attempt to login a user
	public function login() {
		$user = array(
			'id' => Input::get('email'),
			'password' => Input::get('password')
		);

		if (Auth::attempt($user, Input::has('remember'))) {
			return Redirect::intended('/') -> with(array(
				'alert' => 'You are successfully logged in.',
				'alert-class' => 'alert-success'
			));
		} else {
			return Redirect::intended('login') -> with(array(
				'alert' => 'Your username/password combination was incorrect.',
				'alert-class' => 'alert-danger'
			)) -> withInput();
		}
	}

	// Logout a logged in user
	public function logout() {
		Auth::logout();
		return Redirect::route('home') -> with(array(
			'alert' => 'You are successfully logged out.',
			'alert-class' => 'alert-success'
		));
	}

	// Create register view
	public function showRegister() {
		return View::make('auth.register');
	}

	// Attempt to register a new user
	public function register() {
		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		$email = Input::get('email');
		$password = Input::get('password');
		$confirm_password = Input::get('confirm_password');

		// Attempt to save a new user to the database
		if (strcmp($password, $confirm_password) == 0) {
			$hashed_password = Hash::make($password);
			try {
				$user = new User;
				$user -> id = $email;
				$user -> first_name = $first_name;
				$user -> last_name = $last_name;
				$user -> password = $hashed_password;
				$user -> role = 'User';
				$user -> save();
			} catch (\Illuminate\Database\QueryException $e) {
				return Redirect::route('register') -> with(array(
					'alert' => 'Error: Failed to register user in database.',
					'alert-class' => 'alert-danger'
				));
			}

			// Login the new user
			$user = User::where('id', $email) -> first();
			Auth::login($user);

			return Redirect::route('home') -> with(array(
				'alert' => 'Welcome! You have successfully created an account, and have been logged in.',
				'alert-class' => 'alert-success'
			));
		}

		return Redirect::route('register') -> with(array(
			'alert' => 'The attempt to create an account was unsuccessful!',
			'alert-class' => 'alert-danger'
		));
	}

	// get all users and send them to admin moderate user page
	public function listUsers() {
		$users = User::all() -> reverse();
		return View::make('admin.users', compact('users'));
	}
	// create a new user
	public function create() {
		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		$email = Input::get('email');
		$password = Input::get('password');
		$role = Input::get('role');
		
		$hashed_password = Hash::make($password);

		$user = new User;
		$user -> id = $email;
		$user -> first_name = $first_name;
		$user -> last_name = $last_name;
		$user -> password = $hashed_password;
		$user -> role = $role;
		$user -> save();

		return Redirect::route('modUsers') -> with(array(
			'alert' => 'Successfully created user',
			'alert-class' => 'alert-success'
		));
	}

	// create a view with a users information for editing
	public function edit(User $user) {
		return View::make('admin.user.edit', compact('user'));
	}

	// save changes to a user
	public function save(User $user) {
		$email = Input::get('email');
		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		$password = Input::get('password');
		$role = Input::get('role');

		$user -> id = $email;
		$user -> first_name = $first_name;
		$user -> last_name = $last_name;

		if (!empty($password)) {
			$hashed_pw = Hash::make($password);
			$user -> password = $hashed_pw;
		}

		$user -> role = $role;
		$user -> save();

		return Redirect::route('modUsers') -> with(array(
			'alert' => 'Successfully edited user',
			'alert-class' => 'alert-success'
		));
	}

	// create the delete view to confirm deletion
	public function showDelete(User $user) {
		return View::make('admin.user.delete', compact('user'));
	}

	// delete a user from the database
	public function delete(User $user) {

		try {
			$userId = $user -> id;
			$user -> delete();

		} catch(\Illuminate\Database\QueryException $e) {
			return Redirect::route('modUsers') -> with(array(
				'alert' => 'Error: Failed to delete user.',
				'alert-class' => 'alert-danger'
			));
		}

		return Redirect::route('modUsers') -> with(array(
			'alert' => "You have successfully deleted user $userId.",
			'alert-class' => 'alert-success'
		));
	}
	
	// get posts written by a given user
	public function showPosts(User $user) {
		$posts = Post::where('user_id', $user -> id) -> get();
		return View::make('home', compact('posts'));
	}
	
	// get the full name of a user by giving the user id
	// this is helpful for when you have a foreign key of user_id and need further information
	public static function fullName($id) {
		$user = User::findOrFail($id);
		$fullName = $user -> first_name . ' ' . $user -> last_name;
		return $fullName;
	}

}
