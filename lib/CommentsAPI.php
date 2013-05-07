<?php

class CommentsAPI extends Restful {
	/**
	 * Adds a comment when a valid user posts to /comments/api/add
	 * with the following parameters:
	 *
	 * - comment - The comment value
	 * - identifier - The conversation identifier
	 *
	 * A successful result will include msg and status values, and
	 * if moderation is off, an output value as well containing the
	 * rendered HTML of the new comment.
	 */
	public function post_add () {
		if (! User::require_login ()) {
			return $this->error (__ ('Must be logged in to comment.'));
		}

		if (! isset ($_POST['comment']) || empty ($_POST['comment'])) {
			return $this->error (__ ('Invalid or missing value: comment.'));
		}

		if (! isset ($_POST['identifier']) || empty ($_POST['identifier'])) {
			return $this->error (__ ('Invalid or missing value: identifier.'));
		}

		// if moderation is on, mark as pending
		$status = Appconf::get ('comments','Comments','moderation') ? 0 : 1;

		$c = new Comment (array (
			'identifier' => $_POST['identifier'],
			'user' => User::val ('id'),
			'status' => $status,
			'ts' => gmdate ('Y-m-d H:i:s'),
			'comment' => $_POST['comment']
		));

		if (! $c->put ()) {
			return $this->error ($c->error);
		}

		if ($status === 0) {
			Mailer::send (array (
				'to' => Appconf::get ('comments','Comments','moderator_email'),
				'subject' => __ ('Comment posted, moderation required'),
				'text' => __ ('The following comment has been posted to your site:')
					. "\n\n"
					. User::val ('name') . ': ' . Template::sanitize ($_POST['comment'])
					. "\n\n"
					. __ ('To approve or reject this comment, log in here:')
					. "\n\n"
					. 'http://' . $_SERVER['HTTP_HOST'] . '/comments/admin'
			));

			return array (
				'msg' => __ ('Comment added.'),
				'status' => $status
			);
		}

		$o = $c->orig ();
		$o->name = User::val ('name');
		$o->date = str_replace (' ', 'T', $o->ts) . 'Z';

		return array (
			'msg' => __ ('Comment added.'),
			'status' => $status,
			'output' => View::render ('comments/single', $o)
		);
	}
}

?>