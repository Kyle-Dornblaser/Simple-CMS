<?php

class PostController extends BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function create() {
		$title = Input::get('title');
		$content = Input::get('content');
		$tags = Input::get('tags');
		$category = Input::get('category');
		
		$post = new Post;
		$post -> title = $title;
		$post -> content = $content;
		$post -> category_id = 1;
		$post -> user_id = Auth::user() -> id;
		$post -> save();
		
		return Redirect::route('showPost', array('id' =>  $post -> id));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Post $post) {
		return View::make('posts.post', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		return View::make('posts.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
