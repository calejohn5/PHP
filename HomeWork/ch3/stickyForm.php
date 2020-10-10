<?php

/*
Caleb Johnson
Web Scripting Ch3
php sticky form*/

//
$error_no = 0;
if (isset($_POST['btn_submit'])) {
	if($_POST['username'] == '' || $_POST['comments']=='') {
		$error_no++;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<style>
	.form-control {
		padding: 4px 8px;
		border-radius: 4px;
		min-width: 400px;
	}
	</style>
</head>
<body>
<?php if(!isset($_POST['btn_submit']) || $error_no > 0): ?>

<!-- create our form and have it post back to itself -->
<form name="form1" id="form1" class="form" action="index.php" method="POST">

<!-- checking to see if a name was posted, if not an error is echo'd back -->
    <label>Name:<?php if (isset($_POST['username'])) { echo '<span class="error"></br><b>ENTER A NAME</b></span>'; } ?></label><br>
    <input type="text" name="username" class="form-control" <?php if(!empty($_POST['username'])) echo 'value="'.$_POST['username'].'"'; else echo 'placeholder"=Please fill"'; ?>/> <br>
</br></br><hr/>

<!-- create and sticky our checkboxes -->
	<label>Check what computer science knowledge you have!</label><br/>
	<input type="checkbox" name="Java" <?php echo (isset($_POST['Java'])?'checked="checked"':'') ?> />
	<label for="vehicle1"> I know Java</label><br>
	<input type="checkbox" name="Php" <?php echo (isset($_POST['Php'])?'checked="checked"':'') ?> />
	<label for="vehicle2"> I know Php</label><br>
	<input type="checkbox" name="Jquery" <?php echo (isset($_POST['Jquery'])?'checked="checked"':'') ?> />
	<label for="vehicle3"> I know Jquery</label><br>
</br></br><hr/>

	<textarea name="comments" class="form-control"><?php if(isset($_POST['comments'])) echo $_POST['comments']; ?> </textarea>

	<button type="submit" name="btn_submit" class="btn btn-primary btn-md">Submit</button>
</form>
<?php else: ?>
	<h3> Thank you for submitting the form, <?php echo $_POST['username']; ?></h3>
	<h4> You know <?php 
	
/// give feedback depending on checkboxes checked
if (isset($_POST['Java'])) {
    echo 'java, ';
} else {
   echo '';
}
if (isset($_POST['Php'])) {
    echo 'php, ';
} else {
   echo '';
}
if (isset($_POST['Jquery'])) {
    echo 'jquery, ';
} else {
   echo '';
} 
// if all checks are empty
if(empty($_POST['Java' || 'Php' || 'Jquery'])) {
    echo 'none of these, ';
} else {
   echo '';
}
?>nice!<h4> </br></hr>
<h5>You submitted the following comments...</h5><br/><?php echo $_POST['comments'];?>
<?php endif;?>
</body>
</html>
