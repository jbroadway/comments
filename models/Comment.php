<?php

class Comment extends Model {
	public $table = '#prefix#comments';

	/**
	 * Get comments by identifier and status. Also includes
	 * user.name and sorts by timestamp ascending.
	 */
	public static function by_identifier ($i, $status = 1) {
		return DB::fetch (
			'select
				#prefix#comments.*, #prefix#user.name
			from
				#prefix#comments, #prefix#user
			where
				#prefix#comments.identifier = ? and
				#prefix#comments.status = ? and
				#prefix#comments.user = #prefix#user.id
			order by
				#prefix#comments.ts asc',
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
				#prefix#comments
			where
				#prefix#comments.identifier = ? and
				#prefix#comments.status = 1',
			$i
		);
	}
	
	/**
	 * Get a list of comments requiring moderation.
	 */
	public static function in_moderation () {
		return DB::fetch (
			'select
				#prefix#comments.*, #prefix#user.name
			from
				#prefix#comments, #prefix#user
			where
				#prefix#comments.status = 0 and
				#prefix#comments.user = #prefix#user.id
			order by
				#prefix#comments.ts asc'
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
				#prefix#comments
			group by
				identifier
			order by
				identifier asc'
		);
	}
}
