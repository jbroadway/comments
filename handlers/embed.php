<?php

/**
 * Embed comments into a page.
 */

$page->add_script ('/apps/comments/js/humane.js');

$i = isset ($data['identifier']) ? $data['identifier'] : $_SERVER['REQUEST_URI'];

$comments = Comment::by_identifier ($i);

echo $tpl->render ('comments/embed', array (
	'comments' => $comments,
	'count' => count ($comments),
	'identifier' => $i
));

?>