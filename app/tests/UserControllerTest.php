<?php

class UserControllerTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testUsernameIsRequired(){
		$user = new User;
		$user -> first_name = 'First';
		$user -> last_name = 'Last';
		$user -> password = Hase::make('password');
		$user -> role = 'User';
		$user -> save();

		$this->assertFalse($user->save());

		// Save the errors
		$errors = $user->errors()->all();
 
		// There should be 1 error
		$this->assertCount(1, $errors);
 
		// The username error should be set
		$this->assertEquals($errors[0], "The username field is required.");
	}
}
