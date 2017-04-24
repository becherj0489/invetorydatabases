<?php
	// Get a connection for the database
	require_once('../mysqli_connect.php');

	// Create a query for the database
	$query = "SELECT brand, title, classification , copyrightyear, location FROM equipment_manuals";

	// Get a response from the database by sending the connection
	// and the query
	$response = @mysqli_query($dbc, $query);

	// If the query executed properly proceed
	if($response){

	echo '<table align="left"
	cellspacing="5" cellpadding="8">

	<tr><td align="left"><b>Brand</b></td>
	<td align="left"><b>Title</b></td>
	<td align="left"><b>Classification</b></td>
	<td align="left"><b>Copyright Year</b></td>
	<td align="left"><b>Location</b></td>';

	// mysqli_fetch_array will return a row of data from the query
	// until no further data is available
	while($row = mysqli_fetch_array($response)){

	echo '<tr><td align="left">' . 
	$row['brand'] . '</td><td align="left">' . 
	$row['title'] . '</td><td align="left">' .
	$row['classification'] . '</td><td align="left">' . 
	$row['copyrightyear'] . '</td><td align="left">' .
	$row['location'] . '</td><td align="left">' . 

	echo '</tr>';
	}

	echo '</table>';

	} else {

	echo "Couldn't issue database query<br />";

	echo mysqli_error($dbc);

	}

	// Close connection to the database
	mysqli_close($dbc);

?>