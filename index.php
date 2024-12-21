<?php

$app_path = realpath('');
define ('__APP_PATH', $app_path);

//require $app_path.'/vendor/autoload.php';

include $app_path.'/config/config.php';

$root = realpath("");

define('ROOT', $root);

require_once(ROOT. '/system/core/core.php');

$registry = new registry();
$registry->config = $config;
$registry->template = new template();

require_once(ROOT. '/system/config/init.php');


$router = new router($registry);
$router->route();

?>