<?php
require 'config/config.php';

function listSubscriptions($client) {
    $service = new Google_Service_YouTube($client);
    $queryParams = [
        'mine' => true,
        'maxResults' => 50
    ];
    return $service->subscriptions->listSubscriptions('snippet,contentDetails', $queryParams);
}

$subscriptions = listSubscriptions($client);
?>

<!DOCTYPE html>
<html>
<head>
    <title>TubeTamer</title>
</head>
<body>
    <h1>Manage Your YouTube Subscriptions</h1>
    
    <!-- List subscriptions -->
    <?php
    foreach ($subscriptions['items'] as $subscription) {
        echo "<p>{$subscription['snippet']['title']} 
            <form method='POST' action='unsubscribe.php' style='display:inline;'>
                <input type='hidden' name='subscription_id' value='{$subscription['id']}'>
                <button type='submit'>Unsubscribe</button>
            </form>
        </p>";
    }
    ?>
    
    <!-- Add subscription form -->
    <form method="POST" action="add_subscription.php">
        <input type="text" name="channel_id" placeholder="Channel ID" required>
        <button type="submit">Subscribe</button>
    </form>
</body>
</html>
