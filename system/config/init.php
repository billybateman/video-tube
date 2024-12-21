<?php


foreach($config['helpers'] as $helper){
	$registry->$helper = new $helper($registry, '');
}


foreach($config['libraries'] as $libraries){
	$registry->$libraries = new $libraries($registry, '');

}


foreach($config['models'] as $model){
	$registry->$model = new $model($registry, '');

}


if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
$link = "https";
else
  $link = "http";
 
// Here append the common URL characters.
$link .= "://";
 
// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];
 
// Append the requested resource location to the URL
//$link .= $_SERVER['REQUEST_URI'];
 
// Print the link
//echo $link;


$the_routes = new sites_model();
$results = array();
$results = $the_routes->get_by_url($link);
//var_dump($results);

$registry->session->set('sites', 1);
$registry->session->set('sites_id', 1);

define('SITES_ID', 1);

//exit;


?>