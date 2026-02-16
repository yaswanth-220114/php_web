

<?php
require_once 'vendor/autoload.php';
session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$provider = new League\OAuth2\Client\Provider\Github([
    'clientId'     => $_ENV['GITHUB_CLIENT_ID'],
    'clientSecret' => $_ENV['GITHUB_CLIENT_SECRET'],
    'redirectUri'  => 'http://localhost/php_website/github_login/callback.php',
]);

$authUrl = $provider->getAuthorizationUrl([
    'scope' => ['user:email']
]);

$_SESSION['oauth2state'] = $provider->getState();

header('Location: ' . $authUrl);
exit();
