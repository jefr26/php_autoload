<?php
namespace Test;

defined('BASE_PATH') or define('BASE_PATH', __DIR__ . '/');
defined('NAME_SPACE') or define('NAME_SPACE', __NAMESPACE__);

include('../Autoload.php');

spl_autoload_register('autoload');

$a = new ClassA();
var_dump($a->test());

$b = new Example\ClassB();
var_dump($b->test());