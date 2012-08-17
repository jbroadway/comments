<?php

/**
 * Approve or reject a post.
 */

$this->require_admin ();

$redir = isset ($_GET['redirect']) ? $_GET['redirect'] : '/comments/admin';

if (! isset ($_GET['id']) || ! is_numeric ($_GET['status'])) {
	$this->add_notification (__ ('An error occurred.'));
	$this->redirect ($redir);
}

if (! isset ($_GET['status']) || ! is_numeric ($_GET['status'])) {
	$this->add_notification (__ ('An error occurred.'));
	$this->redirect ($redir);
}

$c = new Comment ($_GET['id']);
if ($c->error) {
	$this->add_notification (__ ('An error occurred.'));
	$this->redirect ($redir);
}

$c->status = $_GET['status'];
$c->put ();
if ($_GET['status'] == 1) {
	$this->add_notification (__ ('Comment approved.'));
} else {
	$this->add_notification (__ ('Comment rejected.'));
}
$this->redirect ($redir);

?>