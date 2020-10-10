<?php 
/*
Caleb Johnson Pursue 3-5
CIS 1610
Web Scripting
*/


$page_title = 'View the Current Users';
include('includes/header.html');

// Page header:
echo '<h1>Registered Users</h1>';

require_once('mysqli_connect.php'); // Connect to the db.

// Make the query:
    $q = "SELECT CONCAT(last_name, ', ', first_name) AS name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr FROM users ORDER BY registration_date ASC";
    $r = @mysqli_query($conn, $q); // Run the query.
//////////////////////////////////////////////////////////
/*
PURSUE CHANGE mysqli_num_rows() SO IT ONLY RUNS WHEN QUERY IS TRUE. 
Do this with if else
*/
////////////////////////////////////////////////////////////////////
if($r) { 
// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p>There are currently $num registered users.</p>\n";

	// Table header.
	echo '<table width="60%">
	<thead>
	<tr>
		<th align="left">Name</th>
		<th align="left">Date Registered</th>
	</tr>
	</thead>
	<tbody>
';

	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td align="left">' . $row['name'] . '</td><td align="left">' . $row['dr'] . '</td></tr>
		';
	}

	echo '</tbody></table>'; // Close the table.

	mysqli_free_result ($r); // Free up the resources.

} else { // If no records were returned.

	echo '<p class="error">There are currently no registered users.</p>';
}
} else {
    echo '<p class="error">Sorry, the query returned false!</p>';
}

mysqli_close($conn); // Close the database connection.

include('includes/footer.html');
?>