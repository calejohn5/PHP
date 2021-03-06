<?php # Script 10.2 - delete_user.php
// Caleb Johnson
// Web Scripting Chapter 10

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
//	include ('includes/footer.html'); 
	exit();
}

require ('mysqli_connect.php');

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($_POST['sure'] == 'Yes') { // Delete the record.
	
		// Make the query:
		$q = "DELETE FROM users WHERE user_id=$id LIMIT 1";		
		$r = @mysqli_query ($conn, $q);
		if (mysqli_affected_rows($conn) == 1) { // If it ran OK.
			// Print a message:
			echo '<p>The user has been deleted.</p>';	
		} else { // If the query did not run OK.
			echo '<p class="error">The user could not be deleted due to a system error.</p>'; // Public message.
			echo '<p>' . mysqli_error($conn) . '<br />Query: ' . $q . '</p>'; // Debugging message.
		}
	} else { // No confirmation of deletion.
		echo '<p>The user has NOT been deleted.</p>';	
	}
} else { // Show the form.
	// Retrieve the user's information:
	$q = "SELECT last_name,first_name FROM users WHERE user_id=$id";
	$r = @mysqli_query ($conn, $q);

//   while ($row = $r->fetch_assoc()) {
//// FETCH OUR VALUES FROM DATABASE/////
    $row = $r->fetch_assoc();
    $fname =$row['first_name'];
    $lname = $row["last_name"];
    $allname=  $fname." ".$lname;
   $page_title = $allname;

echo '<h2>Delete a User</h2>';
//}
	if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

		// Get the user's information:
		$row = mysqli_fetch_array ($r, MYSQLI_NUM);
		
		// Display the record being deleted:
		echo "<h3>Name: $row[0]</h3>
		Are you sure you want to delete this user?";
		
		// Create the form:
		echo '<form action="delete_user.php" method="post">
	<input type="radio" name="sure" value="Yes" /> Yes 
	<input type="radio" name="sure" value="No" checked="checked" /> No
	<input type="submit" name="submit" value="Submit" />
	<input type="hidden" name="id" value="' . $id . '" />
	</form>';
	
	} else { // Not a valid user ID.
		echo '<p class="error">This page has been accessed in error.</p>';
	}
} // End of the main submission conditional.

mysqli_close($conn);

include ('includes/header.html');
		
include ('includes/footer.html');
?>