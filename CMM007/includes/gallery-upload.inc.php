<?php

//check if the submission is done correctly from submit
if (isset($_POST['submit'])) {

    // To grab the in put from the input from the form
    //A default name will be created for an empty filename
    $newFileName = $_POST['filename'];
   if (empty($newFileName)) {
         $newFileName = "gallery";  
    } else { //change spaces into dash and ensure all cases are lower case
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }
    //Grab the image and the description from the form
    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];

    //Lastly, grab the file from the form
    $file = $_FILES['file'];

    //Property of the files from the print_r function
        $fileName = $file["name"];
        $fileType = $file["type"];
        $fileTempName = $file["tmp_name"];
        $fileError = $file["error"];
        $fileSize = $file["size"];

        // ##Error handling
    //Using the function explode to extract the extension of the file
    //if the file has a all caps extension this will be changed
        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        //Types of file to be allowed
        $allowed = array("jpg", "jpeg", "png");

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 2000000) {
            //To ensure the name of two files aren't the same
            $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
            //The destination of the files
            $fileDestination = "../img/gallery/" . $imageFullName;


            include_once "dbh.inc.php";
            // check if the data goes to the database before it's
            //check if file or image img 
            if (empty($imageTitle) || empty($imageDesc)) {
                header("Location: ../gallery.php?upload=empty"); //if empty error message sends the user back
                exit();
            } else {
                $sql = "SELECT * FROM gallery;"; //a statement to select from gallery (rows)
                //grab data using a prepared statement
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {  // Check if the stament is not prepared
                    echo "SQL statement failed";
                } else {
                    //Execute the prepared statement
                    mysqli_stmt_execute($stmt);
                    //check result for the number of rows
                    $result = mysqli_stmt_get_result($stmt);
                    $rowCount = mysqli_num_rows($result);
                    //set image order to take row 1 and so on
                    $setImageOrder = $rowCount + 1;

                    $sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES (?, ?, ?, ?);";

                    if (!mysqli_stmt_prepare($stmt, $sql)) {  
                        echo "SQL statement failed";
                    } else {
                        mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
                        //execute the statement
                        mysqli_stmt_execute($stmt);

                        //upload image to the sever
                        move_uploaded_file($fileTempName, $fileDestination);

                        header("Location: ../gallery.php?upload=success");
                    }
                }
            }

            } else {
            echo "File size is too big";
            exit();
                }
            }   else {
                echo "you had an error";
                exit();
            }
            }   else {
                echo "upload a proper file type";
                exit();
           } 
           }