<?php

/**
 * Embed comments into a page. Can also be used as the comments
 * in the blog app by setting `comments = comments/embed` in the
 * blog app configuration.
 */

$i = (isset ($data['identifier']) && ! empty ($data['identifier']))
	? $data['identifier']
	: $_SERVER['REQUEST_URI'];

if (isset ($data['count'])) {
	echo $this->run ('comments/count', $data);
	return;
}

$page->add_script ('/apps/comments/js/humane.js');

$comments = Comment::by_identifier ($i);

echo $tpl->render ('comments/embed', array (
	'comments' => $comments,
	'count' => count ($comments),
	'identifier' => $i
));

?>