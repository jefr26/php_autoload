<?php
/**
 * Class for autoloading classes with the namespaces.
 */
class Autoload
{
	/**
	 * Directory to find the classes
	 * @var string
	 */
	private $base_dir = '';

	/**
	 * Namespace of the classes
	 * @var string
	 */
	private $namespace = '';

	/**
	 * Set the path of the classes
	 * @return void
	 */
	public function __construct($base_dir, $namespace)
	{
		$this->base_dir = $base_dir;
		$this->namespace = $namespace;
		spl_autoload_register(array($this, 'load'));
	}

	/**
	 * Find the class in the path
	 * @param string $class Class to load
	 * @return void
	 */
	public function load($class)
	{
		$len = strlen($this->namespace . '\\');
		$relative_class = substr($class, $len);
		$class = $this->base_dir . str_replace('\\', '/', $relative_class) . '.php';
		$class = strtolower($class);
		if (!file_exists($class)) {
			throw new \Exception( "File path '{$class}' not found." );
   		}
   		require_once($class);
	}
}
