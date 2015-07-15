<?php

if (! isset ($this->lang_hash['fr'])) {
	$this->lang_hash['fr'] = array ();
}

$this->lang_hash['fr'] = array_merge (
	$this->lang_hash['fr'],
	array (
		'Add a comment:' => 'Ajouter un commentaire :',
		'Approve' => 'Approuver',
		'Approved' => 'Approuvé',
		'No comments.' => 'Aucun commentaire.',
		'Comment' => 'Commentaire',
		'Comment added.' => 'Commentaire ajouté.',
		'Comment approved.' => 'Commentaire approuvé.',
		'Comment posted, moderation required' => 'Commentaire envoyé, modération requise',
		'Comment rejected.' => 'Commentaire rejeté.',
		'Comments' => 'Commentaires',
		'Conversations:' => 'Conversations :',
		'Date/time' => 'Date/heure',
		'Pending' => 'En attente',
		'In moderation:' => 'En modération :',
		'Conversation identifier' => 'Identifiant de la conversation',
		'The following comment has been posted to your site:' => 'Le commentaire suivant a été posté sur votre site :',
		'To approve or reject this comment, log in here:' => 'Pour approuver ou rejeter ce commentaire, identifiez-vous :',
		'Post comment' => 'Publier un commentaire',
		'Reject' => 'Rejeter',
		'Rejected' => 'Rejeté',
		'All conversations' => 'Toutes les conversations',
		'An error occurred.' => 'Une erreur est survenue.',
		'An unknown error occurred.' => 'Une erreur inconnue est survenue.',
		'User' => 'Utilisateur',
		'Invalid or missing value: comment.' => 'Valeur non valide ou manquante : comment.',
		'Invalid or missing value: identifier.' => 'Valeur non valide ou manquante : identifier.',
		'Please log in to comment.' => 'Veuillez vous conecter pour commenter.',
		'Your comment has been posted.' => 'Votre commentaire a été envoyé.',
		'Your comment is in moderation and should appear shortly.' => 'Votre commentaire est en modération et devrait apparaître prochainement.',
		'Must be logged in to comment.' => 'Vous devez être connecté pour commenter.'
	)
);
