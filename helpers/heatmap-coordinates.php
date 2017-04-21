<?php
  include('db-helper.php');

	# set last recorded tweet id
  $coordinates = getCoordinatesList($db);
  $coordinates_list = $coordinates->fetchAll();

  if (!empty($coordinates_list)) {
    # return json to js script
  	echo json_encode($coordinates_list);
  } else {
    echo "";
  }

?>
