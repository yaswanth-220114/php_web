<?php
use Google\Client;

require_once 'vendor/autoload.php';

$client = new Client();
$client->setAuthConfig('credentials.json');
$client->addScope("email");
$client->addScope("profile");
$client->setRedirectUri('http://localhost/php_website/google_Oauth/callback.php');

session_start();
?>
