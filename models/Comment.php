<?php

class Comment extends Model {
	public $table = 'comments';

	/**
	 * Get comments by identifier and status. Also includes
	 * user.name and sorts by timestamp ascending.
	 */
	public static function by_identifier ($i, $status = 1) {
		return DB::fetch (
			'select
				comments.*, user.name
			from
				comments, user
			where
				comments.identifier = ? and
				comments.status = ? and
				comments.user = user.id
			order by
				comments.ts asc',
			$i,
			$status
		);
	}

	/**
	 * Get a total count of approved comments by identifier.
	 */
	public static function total ($i) {
		return DB::shift (
			'select
				count(*)
			from
				comments
			where
				comments.identifier = ? and
				comments.status = 1',
			$i
		);
	}
	
	/**
	 * Get a list of comments requiring moderation.
	 */
	public static function in_moderation () {
		return DB::fetch (
			'select
				comments.*, user.name
			from
				comments, user
			where
				comments.status = 0 and
				comments.user = user.id
			order by
				comments.ts asc'
		);
	}

	/**
	 * Get a list of comment conversation identifiers.
	 */
	public static function identifiers () {
		return DB::fetch (
			'select
				identifier,
				count(*) as total
			from
				comments
			group by
				identifier
			order by
				identifier asc'
		);
	}
}

?>