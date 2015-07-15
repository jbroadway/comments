<?php

/**
 * Simply redirects to /comments/admin or / for now.
 */

if (! User::require_admin ()) {
	$this->redirect ('/');
} else {
	$this->redirect ('/comments/admin');
}
