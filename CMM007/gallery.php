    <?php
	    include_once 'header.php';
    ?>

    <main>
	<section class="container">
        
			<?php
			if (isset($_SESSION["useruid"])) {
				echo "<p> Hello " . $_SESSION["useruid"] . " </p>";
			}			
	        ?>
        <h2>Shoe Cart</h2> 
            
        </div> 
        <?php
            include_once 'includes/dbh.inc.php';

            $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed!";
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($result)) {
            //  echo '<a>
			//  <div style="bacground-image: url(img/gallery/'.$row["imgFullNameGallery"].');"></div>
            //     <h3>'.$row["titleGallery"].'</h3>
            //     <p>'.$row["descGallery"].'</p>
            // </a>';

//Bootstrap was use to call the image

            echo
            '<div class="card" style="width: 18rem">
            
              <div class="card-body">
              <img src="img/gallery/'.$row["imgFullNameGallery"].'" class="card-img-top" alt="...">
                <h5 class="card-title">'.$row["titleGallery"].'</h5>
                <p class="card-text">'.$row["descGallery"].'</p>
              </div>
            
            </div>';


// echo
//             '<div class="card" style="width: 18rem">
            
//               <div class="card-body">
//               <img src="img/gallery/image-1.606211c7163fb4.00729147.jpg" class="card-img-top" alt="...">
//                 <h5 class="card-title">Addidas</h5>
//                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card content.</p>
//               </div>
            
//             </div>';


            
                }
            }
        ?>    
        
        
         

        
        <?php
			if (isset($_SESSION["useruid"])) {
				echo '<div class="gallery-upload">
                <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
                    <!-- in order to upload file the enctype funtion is needed in the form -->
                    <input type="text" name="filename" placeholder="file name..."><br>
                    <input type="text" name="filetitle" placeholder="Image title...">
                    <input type="text" name="filedesc" placeholder="Image description..."><br>
                    <input type="file" name="file">
                    <button type="submit" name="submit">UPLOAD</button>
                </form>        
            </div>';
			}			
	        ?>
  


        </div>
	</section> 
    </main>  
    <br><br>
		<?php
			include_once 'footer.php';
		?>

	