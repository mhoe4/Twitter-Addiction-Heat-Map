<?php
require_once('TwitterAPIExchange.php');
include('db-helper.php');


/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "832307704492326913-6HUyPMHd1FUoQHlKJFUpjAjAzSrgqGb",
    'oauth_access_token_secret' => "MY4mP36GSwrpR0op0lvD4mrtUplUFIIhVWQwx8l4JaTZb",
    'consumer_key' => "J7mNysEXfv1C7EAS2tN6c52cq",
    'consumer_secret' => "HmnVi32CzR7CznACzJCOk5rvXkiLMq7e38wHmwTaP5twnEUtjq"
);

$url = "https://api.twitter.com/1.1/search/tweets.json";

$last_tweet_id = getLastTweetID($db);
$since_id_list = $last_tweet_id->fetchAll();

$since_id = 0;
if (!empty($since_id_list)) {
	foreach ($since_id_list as $item) {
		$since_id = $item['tweetid'];
	}
}

$requestMethod = "GET";
// $since_id = '844318871674740000';
$getfield = '?q=%23recovery%23addiction&count=100&since_id=' . $since_id;
//$getfield = '?q=%23recovery%23opioidepidemic&count=100&until=2017/04/04';
//opioidepidemic
$twitter = new TwitterAPIExchange($settings);

$response = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
if(isset($response["errors"][0]["message"]) != "") {
  echo json_encode($response[errors][0]["message"]);
  exit();
}

// for($i=0;i<$response.statuses.length;$i++){
//   addTweet($respose.statuses[$i].user.location, $respose.statuses[$i].text, $respose.statuses[$i].id, $respose.statuses[$i].created_at);
//   // "Tue Apr 04 22:55:07 +0000 2017"
// }
echo json_encode($response);
?>
