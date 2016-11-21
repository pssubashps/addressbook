<?php
session_start ();
error_reporting ( E_ALL );

ini_set ( 'display_errors', 1 );

require "vendor/autoload.php";

// Importing controllers
use Subash\Controller\Address;
// setting base url
$base_url = $_SERVER ['SERVER_NAME'] . $_SERVER ['REQUEST_URI'];
// finding the position of index.php in url
$indexPosition = strpos ( $base_url, 'index.php' );
$controller = null;
// if there is no index.php mention in url,set address is default controller
if ($indexPosition === false) {
	$controller = new Address ();
	$method = "index";
} else {
	/**
	 * logic to find controller and its method
	 */
	$base_url = substr ( $base_url, $indexPosition );
	$base_url = str_replace ( "index.php/", "", $base_url );
	$componets = explode ( "/", $base_url );
	// echo "<pre>";print_r($componets);exit;
	$controllerName = "Subash\Controller\\" . ucfirst ( $componets [0] );
	$method = strtolower ( $componets [1] );
	$controller = new $controllerName ();
}
$requestMethod = $_SERVER ['REQUEST_METHOD'];
$data = array ();
if ($requestMethod == 'POST') {
	$data = $_POST;
}
if ($requestMethod == 'GET') {
	$data = $_GET;
}
// executing the controller
$controller->$method ( $data );



