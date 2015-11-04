<?php
// Start Bootstrap Application
require_once __DIR__ . '/bootstrap.php';

//use Controllers\HomeController;
//$app = new HomeController;
//$app->message()->out();

// $options array is to pass some variables to be used in the view
$params = [];
Utils\View::render('login', $params);