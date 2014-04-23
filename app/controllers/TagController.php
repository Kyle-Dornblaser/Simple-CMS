<?php

/*
 * This is the controller for the Tag model.
 *
 */

class TagController extends BaseController {
	
	// returns a view to show all the posts that have a given $tag
	public function show(Tag $tag) {
		$posts = $tag -> posts;
		return View::make('home', compact('posts'));
	}
	
	// currently just returns all the tags
	// TODO: make this actually find the popular tags
	public static function popularTags() {
		$popularTags = Tag::all();
		return $popularTags;
	}
	

}
