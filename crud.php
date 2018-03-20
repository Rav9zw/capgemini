<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$loader = require __DIR__ . '/vendor/autoload.php';

$loader->add('Ajax', __DIR__ );
$loader->add('Config', __DIR__ );

$users=new \Ajax\Users;


if(isset($_POST['choice'])){

$users->$_POST['choice']($_POST);	

}else
$users->read();		








?>