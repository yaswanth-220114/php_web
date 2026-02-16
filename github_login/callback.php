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

if (!isset($_GET['code'])) {
    exit('Authorization failed');
}

if (isset($_GET['state']) && $_GET['state'] !== $_SESSION['oauth2state']) {
    unset($_SESSION['oauth2state']);
    exit('Invalid state');
}

try {
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    $user = $provider->getResourceOwner($token);
    $userData = $user->toArray();

    $_SESSION['github_id'] = $userData['id'] ?? $user->getId();
    $_SESSION['github_login'] = $userData['login'] ?? '';
    $_SESSION['github_name'] = $userData['name'] ?? '';
    $_SESSION['github_email'] = $userData['email'] ?? '';
    $_SESSION['github_avatar'] = $userData['avatar_url'] ?? '';

    header('Location: dashboard.php');
    exit();
} catch (Exception $e) {
    exit('Failed to get access token: ' . htmlspecialchars($e->getMessage()));
}
?>
