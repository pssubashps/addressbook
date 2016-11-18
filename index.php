<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "vendor/autoload.php";

$base_url = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$base_url = substr($base_url,strpos($base_url,'index.php'));
$base_url = str_replace("index.php","",$base_url );
echo $base_url;exit;

?>