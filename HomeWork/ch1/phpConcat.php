<?php
/*
Caleb Johnson
Web Scripting
Ch1 script 2
*/
$numberOne = 4324.2345434;
$numberTwo = 546.32;
define('PI',3.14159265);
$divResult = intdiv($numberOne,$numberTwo);
?>
<!DOCTYPE html>
<html>
<head>
</head>

<body>
	<?php
		echo $numberOne.' divided by ' .$numberTwo. ' is ' .$divResult;
		echo '<br/>';
		echo 'PI rounded to the 5th number is ' .round(PI,5). ' using the round method.';
		echo '<br/>';
		echo 'PI rounded to the 2nd number is ' .number_format(PI,2). ' using the number_format method.';
		echo '<br/>';
		
	?>
</body>

</html>


