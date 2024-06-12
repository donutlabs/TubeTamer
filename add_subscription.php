<?php
require 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['channel_id'])) {
    $channelId = $_POST['channel_id'];

    function subscribeToChannel($client, $channelId) {
        $service = new Google_Service_YouTube($client);
        $resource = new Google_Service_YouTube_Subscription();
        $resource->setSnippet(new Google_Service_YouTube_SubscriptionSnippet());
        $resource->getSnippet()->setResourceId(new Google_Service_YouTube_ResourceId());
        $resource->getSnippet()->getResourceId()->setChannelId($channelId);
        $resource->getSnippet()->getResourceId()->setKind('youtube#channel');
        return $service->subscriptions->insert('snippet', $resource);
    }

    $response = subscribeToChannel($client, $channelId);
    header('Location: index.php');
    exit();
}
?>
