<?php

class CreditCardController extends BaseController {

	public function save() {
		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		$card_number = Input::get('card_number');
		$verification = Input::get('verification');
		$month = Input::get('month');
		$year = Input::get('year');
		$expiration = $month . '/' . $year;

		$creditcard = new CreditCard;
		$creditcard -> first_name = $first_name;
		$creditcard -> last_name = $last_name;
		$creditcard -> number = $card_number;
		$creditcard -> verification = $verification;
		$creditcard -> expiration = $expiration;
		$creditcard -> user_id = Auth::user() -> id;
		$creditcard -> save();

		$user = Auth::user();
		//don't want to overwrite our admins
		if ($user -> role != 'Admin') {
			$user -> role = 'Premium';
			$user -> save();
		}

		return Redirect::intended('/') -> with(array('alert' => 'Congrats! You are now a premimum member.', 'alert-class' => 'alert-info'));

	}

}
