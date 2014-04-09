<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('posts', function(Blueprint $table) {
			$table -> increments('id');
			$table -> string('title', 128);
			$table -> binary('content'); //BLOB equivalent
			$table -> integer('category_id') -> unsigned();
			$table -> string('user_id', 64);
			$table -> timestamps();
			
			$table -> foreign('category_id') -> references('id') -> on('categories') -> onDelete('cascade');
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
		Schema::drop('posts');
	}

}
