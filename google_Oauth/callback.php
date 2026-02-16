<?php
use Google\Service\Oauth2;

require 'config.php';

if (isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $google_service = new Oauth2($client);
    $data = $google_service->userinfo->get();

    $_SESSION['name'] = $data->name;
    $_SESSION['email'] = $data->email;

    header('Location: support.php');
    exit();
}
?>
