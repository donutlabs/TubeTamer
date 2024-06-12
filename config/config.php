<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Google\Client as Google_Client;
use Google\Service\YouTube as Google_Service_YouTube;

session_start();

$client = new Google_Client();
$client->setAuthConfig(__DIR__ . '/../client_secret_722580292832-3l5aoc2g45hb6vh8ldpjlhttaj11djuk.apps.googleusercontent.com');
$client->addScope(Google_Service_YouTube::YOUTUBE);
$client->setRedirectUri('http://localhost/TubeTamer/oauth2callback.php');

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
} else {
    $redirect_uri = $client->createAuthUrl();
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    exit();
}

?>
