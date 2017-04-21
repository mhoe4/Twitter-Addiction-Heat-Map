$(document).ready(function(){
  $.ajax({
    url: "helpers/list-tweet-locations.php",
    type: "POST",
    data: {
  },
  success: function(result) {
    var locationsListJSON = JSON.parse(result);
    var l = locationsListJSON.length;
    for (var i = 0; i < locationsListJSON.length; i++) {
      var location = locationsListJSON[i].location;
      var tweetid = locationsListJSON[i].tweetid;
      getLatLong(location, tweetid);

    }
  }});
});

function getLatLong(location, tweetid){
  $.ajax({
    url: 'helpers/geocoding.php',
    type: "POST",
    data: {
      location: location
    },
    success: function(result){
      var parsedLocation = JSON.parse(result);
      var lat = parsedLocation.results[0].geometry.location.lat.toString();
      var lng = parsedLocation.results[0].geometry.location.lng.toString();
      addCoordinates(location, tweetid, lat, lng);
    }
  });
}

function addCoordinates(location, tweetid, lat, lng){
  $.ajax({
    url: 'helpers/addCoordinates.php',
    type: "POST",
    data: {
      location: location,
      tweetid: tweetid,
      lat: lat,
      lng: lng
    },
    success: function(result){

    }
  });
}
