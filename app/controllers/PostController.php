<?php

class PostController extends BaseController {

	public function save(Post $post = NULL) {
		// post does not exist yet
		if ($post == NULL) {
			$post = new Post;
		}
		$title = Input::get('title');
		$content = Input::get('content');
		$tags = explode(' ', Input::get('tags'));
		$category = Input::get('category');

		$post -> title = $title;
		$post -> content = $content;
		$post -> category_id = 1;
		$post -> user_id = Auth::user() -> id;
		$post -> save();

		foreach ($tags as $key => $tagName) {
			// check to see if tag is in database
			if (Tag::find($tagName)) {
				// check to see if tag exists on this post
				if (!($this -> containsTag($post, $tagName))) {
					$tag = Tag::find($tagName);
					$tag -> id = $tagName;
					$tag -> save();
					$tag = Tag::find($tagName);
					$post -> tags() -> save($tag);
				}
			// tag is not in the database
			} else {
				$tag = new Tag;
				$tag -> id = $tagName;
				$tag -> save();
				$tag = Tag::find($tagName);
				$post -> tags() -> save($tag);
			}
		}
		return Redirect::route('showPost', array('id' => $post -> id));
	}

	public function show(Post $post) {
		return View::make('post.index', compact('post'));
	}

	public function edit(Post $post) {
		return View::make('admin.post.edit', compact('post'));
	}

	public function showDelete(Post $post) {
		return View::make('admin.post.delete', compact('post'));
	}

	public function delete(Post $post) {

		try {
			$postId = $post -> id;
			$post -> delete();

		} catch(\Illuminate\Database\QueryException $e) {
			return Redirect::route('modPosts') -> with(array('alert' => 'Error: Failed to delete post.', 'alert-class' => 'alert-danger'));
		}

		return Redirect::route('modPosts') -> with(array('alert' => "You have successfully deleted post $postId.", 'alert-class' => 'alert-success'));
	}

	public function listPosts() {
		$posts = Post::all() -> reverse();
		return View::make('admin.posts', compact('posts'));
	}

	// Does post already have this tag
	// Maybe use helper class or facade
	public function containsTag(Post $post, $tagName) {
		$doesContain = false;
		$tags = $post -> tags;
		foreach ($tags as $tag) {
			if ($tag -> id == $tagName) {
				$doesContain = true;
				break;
			}
		}
		return $doesContain;
	}

	public static function tagsString(Post $post) {
		$tagString = '';
		foreach ($post -> tags as $tag) {
			$tagString .= $tag -> id . ' ';
		}
		return $tagString;
	}

}
