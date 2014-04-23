<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('comments', function(Blueprint $table) {
			$table -> increments('id');
			$table -> binary('content');
			//BLOB equivalent
			$table -> string('user_id', 64);
			$table -> integer('post_id') -> unsigned();
			$table -> timestamps();

			$table -> foreign('user_id') -> references('id') -> on('users') -> onDelete('cascade');
			$table -> foreign('post_id') -> references('id') -> on('posts') -> onDelete('cascade');
			
			$table -> engine = 'InnoDB';
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('comments');
	}

}
