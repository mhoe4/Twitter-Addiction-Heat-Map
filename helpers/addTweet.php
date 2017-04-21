<?php
include('db-helper.php');

# set post
$location = $_POST['location'];
$text = $_POST['text'];
$tweetid = $_POST['tweetid'];
$tweet_created_date = $_POST['tweet_created_date'];

addTweet($location, $text, $tweetid, $tweet_created_date, $db);

echo json_encode("success");
?>
