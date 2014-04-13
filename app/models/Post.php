<?php

class Post extends Eloquent {
	protected $table = 'posts';

	public function tags() {
		return $this -> belongsToMany('Tag');
	}
	
	public function user() {
		return $this -> belongsTo('User');
	}

}
