<?php
session_start ();
error_reporting(E_ALL);

ini_set('display_errors', 1);

require "vendor/autoload.php";

//require_once __DIR__.'/src/Subash/Controller/Address.php';

use Subash\Controller\Address;

$base_url = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$indexPosition = strpos($base_url,'index.php');
$controller = null;
if($indexPosition === false) {
	$controller = new Address ();
	$method = "index";
}
else{
	$base_url = substr($base_url,$indexPosition );
	$base_url = str_replace("index.php/","",$base_url );
	$componets =  explode("/",$base_url);
	$controllerName = "Subash\Controller\\".ucfirst($componets[0]);
    $method = strtolower($componets[1]);
    $controller = new $controllerName ();
}
$requestMethod = $_SERVER['REQUEST_METHOD'];
$data = array ();
if($requestMethod == 'POST') {
    $data = $_POST;
}

$controller->$method($data);



