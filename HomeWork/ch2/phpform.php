<?php

/*
Caleb Johnson
Web Scripting Ch2
php form*/

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
<?php if(!isset($_POST['frm1submit'])): ?>
	<form name="frm1" method="POST" action="phpform.php">
	*
		<label>Name</label><br/>
		<input type="text" name="usersname" class="form-control"/><br/><hr/>
		*
		<label>sex</label><br/>
		<input type="radio" name="sex" value="M">Male<br/>
		<input type="radio" name="sex" value="F">Female<br/>
		<hr/>
		*
		<label>Do you live in the northern or southern hemisphere?</label><br/>
		<input type="radio" name="hemisphere" value="N">Northern<br/>
		<input type="radio" name="hemisphere" value="S">Southern<br/>
		<hr/>
		<br/>
		
		*
		<label>Choose any amount of activities you like to do</label><br/>
			<input type="checkbox" name="activity" value="bike">
			<label for="bike"> I like to bike</label><br>
			<input type="checkbox" name="activity" value="games">
			<label for="bike"> Playing video games</label><br>
			<input type="checkbox" name="activity" value="sports">
			<label for="sports"> I like to play sports</label><br>
			<input type="checkbox" name="activity" value="neither">
			<label for="neither"> I dont like any of these things</label><br><br>
		</select>
		
		*
		<label>Your age group</label><br/>
		<select name="age" class="form-control">
			<option value="0-29">Under 30</option>
			<option value="30-60">Between 30 and 60</option>
			<option value="60+">Over 60</option>
		</select></br></br><hr/>
		*
		<label>What's your natural colored hair?</label><br/>
		<select name="color" class="form-control">
			<option value="black">Black</option>
			<option value="blonde">Blonde</option>
			<option value="brown">Brown</option>
			<option value="red">Red</option>
			<option value="white">White/Gray</option>
		</select>

		<br/>
		<br/>
		<br/>
		<input type="submit" name="frm1submit" value="Submit"/>
		<br/>
		<br/>
		<hr/>
	</form>
	<?php endif; ?>
	<div id="output">
		<?php 

			if (isset($_POST['usersname'])) {
				$usersname = $_POST['usersname'].' ';
			} else {
				$usersname = 'No name';
			}
			
			if (isset($_POST['sex'])) {
				$sex = $_POST['sex'];
			} else {
				$sex = NULL;
			}
			
			if (isset($_POST['hemisphere'])) {
				$hemisphere = $_POST['hemisphere'];
			} else {
				$hemisphere = NULL;
			}
				
			// use cases to set our age variable
			if (isset ($_POST['age'])) {
				switch($_POST['age']) {
					case '0-29':
						$age = "under the age of 30";break;
					case '30-60':
						$age = "between the ages 30 and 60";break;
					case '60+':
						$age = "over the age of 60";break;
					default:
						$age = NULL;
				}
			} else {
				$age = NULL;
			} 
			///////////
			//Couldn't quite get this one perfect, maybe it has something to do with letting each case fall through
			//without the break;
			if (isset ($_POST['activity'])) {
				switch($_POST['activity']) {
					case 'bike':
						$activity = "riding your bike";break;
					case 'games':
						$activity = "playing videogames";break;
					case 'sports':
						$activity = "playing sports";break;
					case 'neither':
						$activity = "doing neither of these";break;
					case 'bike && games':
						$activity = "riding your bike and playing video games";break;
					case 'bike && sports':
						$activity = "riding your bike and playing sports";break;
					//case 'games && sports':
						//$activity = "playing video games and sports";break;
					case activity == 'games' && activity == 'sports':
						$activity = "playing video games and sports";break;
					case 'sports && games && bike':
						$activity = "doing a lot of things";break;
					case 'neither && sports || bike || games':
						$activity = "lying on forms";break;
					default:
						$activity = NULL;
				}
			} else {
				$activity = NULL;
			} 
			////////////////// set hair color
						if (isset ($_POST['color'])) {
				switch($_POST['color']) {
					case 'black':
						$color = "with black hair";break;
					case 'blonde':
						$color = "with blonde hair";break;
					case 'brown':
						$color = "with brown hair";break;
					case 'red':
						$color = "with red hair";break;
					case 'white':
						$color = "with white or gray hair";break;
					default:
						$color = NULL;
				}
			} else {
				$color = NULL;
			} 
			////////////////// add in mr or mrs using our sex variable
			echo "<pre>".print_r($_POST,true)."<pre>";
			echo "<br/><hr/><br/>";
			//
			if($sex = 'M') {
			echo 'Mr. ';
			} else { 
				echo 'Mrs. ';
			}
			// Start the feedback of what was submitted
			echo $usersname;
			if($sex = 'M') {
			echo 'you are a male'.' ';
			} else { 
				echo 'you are a female'.' ';
			}
			echo $age.' ';
			echo $color.'.';
			echo '<br/>';
			echo 'You enjoy '.$activity;

			if($hemisphere = 'N') {
			echo 'in the northern hemisphere where you live.';
			} else { 
				echo 'in the southern hemisphere where you live.';
			}
			
		?>
	</div>
</body>
</html>
