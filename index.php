<?php
// Start Bootstrap Application
require_once __DIR__ . '/bootstrap.php';

// Call Main Action to Handle Client's Requests
$app = new Application;
$app->main();