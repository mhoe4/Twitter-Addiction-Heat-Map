$(document).ready(function(){
  $.ajax({
    url: "helpers/twitter-search.php",
    type: "POST",
    data: {
  },
  success: function(data) {
    var twitterJSON = JSON.parse(data);
    var l = twitterJSON.statuses.length;
    for (var i = 0; i < twitterJSON.statuses.length-1; i++) {
      var location = twitterJSON.statuses[i].user.location;
      var text = twitterJSON.statuses[i].text;
      var tweetid = twitterJSON.statuses[i].id;
      var tweet_created_date = twitterJSON.statuses[i].created_at;
      //ajax call to get add tweet to DB
				$.ajax({
					url: 'helpers/addTweet.php',
					type: "POST",
					data: {
						location: location,
						text: text,
						tweetid: tweetid,
						tweet_created_date: tweet_created_date
					},
					success: function(data) {
						var f = data;
					}
				})
    }
  }});
});
