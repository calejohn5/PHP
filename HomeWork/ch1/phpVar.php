<?php

/*
Block comment, vs
// or # for single line

Caleb Johnson
Web Scripting
Ch1
*/
$varZero = "This is my first variable";
$varOne = "This is my";
$varTwo = "first variable";
$varThree = $varOne.' '.$varTwo;

?>
<!DOCTYPE html>
<html>
<head>
</head>

<body>
	<?php
		echo "Hello everyone, <em>".$varZero."</em> for today using double quotes.";
		echo '<br/>';
		echo 'Hello everyone, <em>'.$varThree.'</em> for today using single quotes, and a concatenation of the first two variables.';
	?>
</body>

</html>