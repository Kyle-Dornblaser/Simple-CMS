<?php

class Tag extends Eloquent {
	protected $table = 'tags';

	public function artist() {
		return $this -> belongsToMany('Post');
	}

}
