<?php

	//database connection information
	$dsn = 'mysql:dbname=twitter_data;host=localhost;port=3306';
	$user = 'root';
	$password = '';

	//database connection
	try {
		$db = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
    	die("Could not connect to the database:" . $e->getMessage());
	}

  //inserts tweet into table
	function addTweet($location, $text, $tweetid, $tweet_created_date, $db) {
    $sql = "INSERT INTO data (location, text, tweetid, tweet_created_date) VALUES " .
    "('" . $location . "', '" . $text . "', '" . $tweetid . "', '" . $tweet_created_date . "')";
    $db->query($sql);
	}

  //gets largest tweetid from data
  function getLastTweetID($db) {
    $sql = "SELECT MAX(tweetid) AS tweetid FROM data";
    return $db->query($sql);
	}

  //gets location of all tweets coordinates aren't already recorded for
  function getTweetLocations($tweetid, $db) {
    $sql = "SELECT tweetid, location FROM data " .
    "WHERE tweetid > '" . $tweetid . "' ORDER BY tweetid ASC";
    return $db->query($sql);
	}

  //inserts coordinates into table
	function addCoordinates($location, $tweetid, $lat, $lng, $db) {
    $sql = "INSERT INTO coordinates (location, tweetid, lat, lng) VALUES " .
    "('" . $location . "', '" . $tweetid . "', '" . $lat . "', '" . $lng . "')";
    $db->query($sql);
	}

  //gets last tweet id inserted into table
	function getLastCoordinateTweetID($db) {
    $sql = "SELECT MAX(tweetid) AS tweetid FROM coordinates";
    return $db->query($sql);
	}

  //gets list of coordinates
	function getCoordinatesList($db) {
    $sql = "SELECT lat, lng FROM coordinates";
    return $db->query($sql);
	}

?>
