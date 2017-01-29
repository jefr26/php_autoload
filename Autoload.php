<?php
/**
 * Function to autoload classes with the namespace
 * @param string $class Class to load
 * @return void
 */
function autoload($class) {
	$len = strlen(NAME_SPACE . '\\');
	$relative_class = substr($class, $len);
	$class = BASE_PATH . str_replace('\\', '/', $relative_class) . '.php';
	$class = strtolower($class);
	if (!file_exists($class)) {
		throw new \Exception( "File path '{$class}' not found." );
	}
	require_once($class);
}