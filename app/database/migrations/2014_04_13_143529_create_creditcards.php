<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditcards extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('creditcards', function(Blueprint $table) {
			$table -> increments('id');
			$table -> string('first_name', 50);
			$table -> string('last_name', 50);
			$table -> string('number', 20);	
			$table -> string('expiration', 7);
			$table -> string('verification', 4);
			$table -> string('user_id', 64);
			$table -> timestamps();

			$table -> foreign('user_id') -> references('id') -> on('users') -> onDelete('cascade');
			$table -> engine = 'InnoDB';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Scheme::drop('creditcards');
	}

}
