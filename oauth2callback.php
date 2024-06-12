<?php
require 'config/config.php';

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
    
    // Save the token in the database (not shown)
    
    header('Location: index.php');
    exit();
}
?>
