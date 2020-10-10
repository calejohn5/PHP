<?php
require_once('mysqli_connect.php');

$title = "home";

$page = "index";
include('includes/header.html');

$q = "SELECT * FROM users";
$r = mysqli_query($conn, $q);
$num = mysqli_num_rows($r);
mysqli_close($conn);
?>

<?php
?>
<div class = "container">
<br/>

<?php
echo "<p>There are currently $num registered users.</p>\n";
if(!empty($r)) {
	echo "<table class = 'table'>".
		"<thead>".
			"<tr>".
				"<th>User Id</th>".
				"<th>Name</th>".
				"<th>Email</th>".
			"</tr>".
		"</thead>".
		"<tbody>";
	while($row = mysqli_fetch_assoc($r)) {
		echo '<tr>'.
				'<td>'.$row['user_id'].'</td>'.
				'<td>'.$row['last_name'].', '.$row['first_name'].'</td>'.
				'<td>'.$row['email'].'</td>'.
			'</tr>';
	}
		echo '</tbody>'.
			'</table>';
	} else {
		echo mysqli_error($conn);
		echo 'error';
	}
?>
<?php require('includes/footer.html'); ?>