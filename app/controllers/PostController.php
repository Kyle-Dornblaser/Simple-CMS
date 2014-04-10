<?php

class PostController extends BaseController {

	public function create() {
		$title = Input::get('title');
		$content = Input::get('content');
		$tags = explode(',', Input::get('tags'));
		$category = Input::get('category');

		$post = new Post;
		$post -> title = $title;
		$post -> content = $content;
		$post -> category_id = 1;
		$post -> user_id = Auth::user() -> id;
		$post -> save();

		foreach ($tags as $tagName) {
			//also need another check for if the tag itself already exists so we dont make a duplicate one
			$tag = new Tag;
			$tag -> name = $tagName;
			$tag -> save();
			$post -> tags() -> save($tag);
		}

		return Redirect::route('showPost', array('id' => $post -> id));
	}

	public function show(Post $post) {
		return View::make('post.index', compact('post'));
	}

	public function edit(Post $post) {
		return View::make('admin.post.edit', compact('post'));
	}

	public function save(Post $post) {
		$title = Input::get('title');
		$content = Input::get('content');
		//comma delimited collection of tags
		$tags = explode(',', Input::get('tags'));
		$category = Input::get('category');

		foreach ($tags as $tagName) {
			//only add tags that are not already in the post
			//also need another check for if the tag itself already exists so we dont make a duplicate one
			if (!($this -> containsTag($post, $tagName))) {
				$tag = new Tag;
				$tag -> name = $tagName;
				$tag -> save();
				$post -> tags() -> save($tag);
			}
		}

		$post -> title = $title;
		$post -> content = $content;
		$post -> category_id = 1;
		$post -> save();

		return Redirect::route('showPost', array('id' => $post -> id));
	}

	public function listPosts() {
		$posts = Post::all() -> reverse();
		return View::make('admin.posts', compact('posts'));
	}

	public function destroy($id) {
		//
	}

	// Does post already have this tag
	// Maybe use helper class or facade
	public function containsTag(Post $post, $tagName) {
		$doesContain = false;
		$tags = $post -> tags;
		foreach ($tags as $tag) {
			if ($tag -> name == $tagName) {
				$doesContain = true;
				break;
			}
		}
		return $doesContain;
	}

}
