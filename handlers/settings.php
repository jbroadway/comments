<?php

/**
 * This is the settings form for the blog app.
 */

$this->require_admin ();

$page->layout = 'admin';
$page->title = __ ('Comments Settings');

$form = new Form ('post', $this);

$form->data = array (
	'moderation' => $appconf['Comments']['moderation'],
	'moderator_email' => $appconf['Comments']['moderator_email']
);

echo $form->handle (function ($form) {
	if (! Ini::write (
		array (
			'Comments' => array (
				'moderation' => ($_POST['moderation'] === 'yes') ? true : false,
				'moderator_email' => $_POST['moderator_email']
			)
		),
		'conf/app.comments.' . ELEFANT_ENV . '.php'
	)) {
		printf ('<p>%s</p>', __ ('Unable to save changes. Check your folder permissions and try again.'));
		return;
	}

	$form->controller->add_notification (__ ('Settings saved.'));
	$form->controller->redirect ('/comments/admin');
});

?>