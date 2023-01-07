<?php  
require_once("includes/header.php"); 


if(!isset($_POST["uploadButton"])){
    echo "No file sent to page.";
    exit();

}


// 1) create file upload
// $videoUploadData = new VideoUploadData(
//                         $_FILES["fileInput"],
//                         $_POST["titleInput"],
//                         $_POST["descriptionInput"],
//                         $_POST["privacyInput"],
//                         $_POST["categoryInput"],
//                         $userLoggedInObj->getUsername()
    
// );
// 2) Processs video data (upload)

// 3) Check if upload was successful.

?>