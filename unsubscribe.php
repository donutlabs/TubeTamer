<?php
require 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['subscription_id'])) {
    $subscriptionId = $_POST['subscription_id'];

    function unsubscribeFromChannel($client, $subscriptionId) {
        $service = new Google_Service_YouTube($client);
        return $service->subscriptions->delete($subscriptionId);
    }

    unsubscribeFromChannel($client, $subscriptionId);
    header('Location: index.php');
    exit();
}
?>
