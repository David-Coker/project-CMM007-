<?php
	 include_once 'header.php';
	?>

	
		
	<div class="jumbotron"><h2 class="text-center">Log in to view to cart</h2></div><br>
	
	<div class="container">

		<div class="align-middle">
		<form action="includes/login.inc.php" method="post"> 
		<input type="text" name="uid" placeholder="Username/Email"><br><br>
		<input type="password" name="pwd" placeholder="password"><br><br>
		<button type="submit" name="submit">Log in</button>
	</form> 
</div>
</div>
	<?php
	//To check the form has been submitted correctly
	if (isset($_GET["error"])) {
		if ($_GET["error"] == "emptyinput") {
			echo "<p> Fill in all fields!</p>";
		}
		else if ($_GET["error"] == "wronglogin") {
			echo "<p>Incorrect login credentials!</p>";
		}
	
	}
	?>
	

	
	<?php
		 include_once 'footer.php';
	?>