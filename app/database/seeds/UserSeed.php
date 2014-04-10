<?php
class UserSeed extends Seeder {

	public function run() {
		$user = new User;
		$user -> id = 'admin@admin.com';
		$user -> first_name = 'admin';
		$user -> last_name = 'admin';
		$user -> password = Hash::make('admin');
		$user -> role = 'Admin';
		$user -> save();
	}

}
