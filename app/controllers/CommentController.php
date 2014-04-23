<?php

/*
 * This is the controller for the Comment model.
 *
 */

class CommentController extends BaseController {

	// Save a comment
	public function save() {

		$content = Input::get('content');
		$userId = Auth::user() -> id;
		$postId = Input::get('post_id');

		if ($content != '') {
			$comment = new Comment;
			$comment -> content = $content;
			$comment -> user_id = $userId;
			$comment -> post_id = $postId;
			$comment -> save();
		}
		
		// creates a nicely formatted string date
		$createdAt = date('F j, Y \a\t g:i A', strtotime($comment -> created_at));
		
		$user = User::findOrFail($userId);
		$userId = $user -> first_name . ' ' . $user -> last_name;

		$response = array('comment' => $content, 'userId' => $userId, 'createdAt' => $createdAt, 'id' => $comment -> id);
		return Response::json($response);
	}
	// returns the view the confirms you want to delete the comment
	public function showDelete(Comment $comment) {
		return View::make('admin.comment.delete', compact('comment'));
	}
	
	// delete a comment by id
	public function delete(Comment $comment) {
		$commentId = $comment -> id;
		$postId = $comment -> post_id;
		$comment -> delete();
		return Redirect::route('showPost', array('id' => $postId)) -> with(array(
			'alert' => "You have successfully deleted comment $commentId.",
			'alert-class' => 'alert-success'
		));
	}
	
	// get all comments for post by post id
	public static function getComments($id) {
		$comments = Comment::where('post_id', $id) -> get() -> reverse();
		return $comments;
	}

}
