<?php
  include('db-helper.php');

	# set last recorded tweet id
  $last_tweet_id = getLastCoordinateTweetID($db);
  $since_id_list = $last_tweet_id->fetchAll();

  $since_id = 0;
  if (!empty($since_id_list)) {
  	foreach ($since_id_list as $item) {
  		$since_id = $item['tweetid'];
  	}
  }
	$last_tweetid = $since_id;

  $tweet_locations = getTweetLocations($since_id, $db);
  $tweet_locations_list = $tweet_locations->fetchAll();

  if (!empty($tweet_locations_list)) {
    # return json to js script
  	echo json_encode($tweet_locations_list);
  } else {
    echo "";
  }

?>
