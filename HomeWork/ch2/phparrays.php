<?php
/*
Caleb Johnson
Ch2 Arrays assignment
Web Scripting
*/
$foods = array
("1"=>"tacos", 
"2"=>"chips", 
"3"=>"bananas",
"4"=>"fish sticks", 
"5"=>"apples", 
"6"=>"baguettes");


// create new variable to shuffle foods variable
$rand = $foods;
shuffle($rand);

//adding spaces in our array 
$impl = implode(" ",$foods);
$expl = explode("i",$impl);

//create variable to alphabetically sort $foods
$sort1 = $foods;
asort($sort1);
?>
<!DOCTYPE html>
<html>
<head>
	<style>
	div {
	position: fixed;
    left: 15%;
    margin: auto;
	}
	</style>
</head>
<body>
	<pre>
		<?php echo print_r($foods,true); ?>	<hr/>	
	</pre>
	
	<div>
		<b><?php echo print_r($impl,true).'<br/><h4>I have imploded the food array with spaces unlike below.</h4>'; ?></b>
		<?php echo print_r($foods,true);?>
	<hr/><br/>
	
		<p> reload for a new favorite food </p>
		<?php echo $rand[0].' are my favorite food';?>
	<hr/><br/>
		<?php
		///////// check to see if $foods and $impl are an array
		if(is_array($foods)) {
			  echo '$foods is the array we are using.<br/>';
		}?>	
		<?php
		if(is_array($impl)) {
			echo '$impl is the array we are using.';
		} else {
			echo '$impl is not an array, it is a string.';
		}?>	
	<hr/><br/>
	<?php
	////// foreach to list each food by its key
		foreach($foods as $key => $val) {
			echo '<h3>'.$val.' are #'.$key.'</h3>';
		}
		?>
	<hr/><br/>
		<?php 
	//////////// exploded the I in expl variable
		echo print_r($expl,true)."<br/>I hid all of the 'i's";
		?>
	<hr/><br/>
		<?php 
	//////////// sorting from alphabetical order in sort1 variable
		echo print_r($sort1,true)."<br/>Sorted alphabetically";
		?>
	</div>

	
</body>
</html>