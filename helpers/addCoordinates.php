<?php
include('db-helper.php');

# set post
$location = $_POST['location'];
$tweetid = $_POST['tweetid'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];

addCoordinates($location, $tweetid, $lat, $lng, $db);

echo "success";
?>
