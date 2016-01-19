<?php

namespace comments;

class Filter {
	public static function firstname ($name) {
		$parts = explode (' ', $name);
		array_pop ($parts);
		return join (' ', $parts);
	}
}
