			<?php
			include_once 'header.php';
			?>
<div class = container>
			<section>
		
			<?php
			if (isset($_SESSION["useruid"])) {
				echo "<p> Hello " . $_SESSION["useruid"] . " </p>";
			}			
	        ?>
		
	
	<section class="index-categories">

	<div class="jumbotron text-center">
		<div class="container">			
			<h2 class="display-1">Welcome to Flying shoes. </h2>
			<p class="lead">Signup to create a private shoe cart</p>
		</div>
	</div>
		

		<div class="container">
			<div class ="row align-items-center">
				

	<!-- Bootstrap card -->
<div class="card" style="width: 18rem;">
<div class="r-3">
  <div class="card-body">
  <img src="img/gallery/image-1.606211c7163fb4.00729147.jpg" class="card-img-top" alt="...">
    <h5 class="card-title">Addidas</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
</div>

	<!-- Bootstrap card -->
<div class="card" style="width: 18rem;">
<div class="r-3">
  <img src="img/gallery/image-1.6062126ed85709.24314310.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Jordan</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
		</div>
</div>

	<!-- Bootstrap card -->
<div class="card" style="width: 18rem;">
<div class="r-3">
<img src="img/gallery/img2.606212afd09c01.50331445.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Nike</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
		</div>
</div>
			
		</div>
		</div>

	</section> 
</div><br><br>

		<?php
			include_once 'footer.php';
			?>

	