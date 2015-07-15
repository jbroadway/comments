<?php

/**
 * Admin handler for managing comments.
 */

$this->require_admin ();

$page->layout = 'admin';

$page->title = __ ('Comments');

echo $tpl->render ('comments/admin', array (
	'moderate' => Comment::in_moderation (),
	'conversations' => Comment::identifiers ()
));
