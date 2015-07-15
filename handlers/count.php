<?php

/**
 * Output only the number of comments for an identifier.
 */

$i = isset ($data['identifier']) ? $data['identifier'] : $_SERVER['REQUEST_URI'];

echo Comment::total ($i);
