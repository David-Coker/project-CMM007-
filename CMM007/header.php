<?php
	session_start();
?>
	<!DOCTYPE html>
<html lang="en">
<head>
	<title>flying shoes</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>


	

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"> <img src="img/gallery/RGU_logo.jpg" alt="logo" width="120px" lenght="90px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
	<div class="collapse navbar-collapse" id="navbarNav">
					
		<ul class="navbar-nav">
			<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
			<?php
			if (isset($_SESSION["useruid"])) {
				
				echo '<li class="nav-item">
				 <a class="nav-link" href="gallery.php">Cart</a>
			   </li>';

				echo '<li class="nav-item">
          <a class="nav-link" href="includes/logout.inc.php">Log out</a>
        </li>';
				
			}
			 else {
		    echo '<li class="nav-item">
				 <a class="nav-link" href="signup.php">Sign up</a>
			   </li>';
			echo '<li class="nav-item">
          <a class="nav-link" href="login.php">Log in</a>
        </li>';
			 }		
			?>
		</ul>
		</div>
 	 </div>
	</nav>




	

	

	 
