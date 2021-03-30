 <?php
	 include_once 'header.php';
	?>   

<section class="signup-form">  
	 
	<div class="jumbotron text-center">
		<div class="container">			
			<h2 class="display-1">Register now </h2>
			<p class="lead">You have the previledge to create a cart</p>
		</div>
	</div>

	<div class="container">
	 <form action="includes/signup.inc.php" method="post"> 
		
		<!-- Signup inputs -->
<input type="text" name="name" placeholder="Full name"><br><br>
<input type="text" name="email" placeholder="Email"><br><br>
<input type="text" name="uid" placeholder="Username"><br><br>
<input type="password" name="pwd" placeholder="password"><br><br>
<input type="password" name="pwdrepeat" placeholder="Repeat password"><br><br>
<button type="submit" name="submit">Sign Up</button><br>


		
	</form> 
</div>

	<?php
	//To check the form has been submitted correctly
	if (isset($_GET["error"])) {
		if ($_GET["error"] == "emptyinput") {
			echo "<p> Fill in all fields!</p>";
		}
		else if ($_GET["error"] == "invaliduid") {
			echo "<p>Choose a proper username!</p>";
		}
		else if ($_GET["error"] == "invalidemail") {
			echo "<p>Choose a proper email!</p>";
		}
		else if ($_GET["error"] == "passwordsdontmatch") {
			echo "<p>password dont match!</p>";
		}
		else if ($_GET["error"] == "stmtfailed") {
			echo "<p>Something went wrong!</p>";
		}
		else if ($_GET["error"] == "usernametaken") {
			echo "<p>Username already taken!</p>";
		}
		else if ($_GET["error"] == "none") {
			echo "<p>You have signed up!</p>";
		}
	}
	?>
	</section>

	


	<?php
		include_once 'footer.php';
	?> 
