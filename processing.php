<?php  
require_once("includes/header.php"); 
require_once("includes/classes/VideoUploadData.php"); 
require_once("includes/classes/VideoProsessor.php"); 






if(!isset($_POST["uploadButton"])){
    echo "No file sent to page.";
    exit();

}


// 1) create file upload

$videoUploadData = new VideoUploadData($_FILES["fileInput"],
                                        $_POST["titleInput"],
                                        $_POST["descriptionInput"],
                                        $_POST["privacyInput"],
                                        $_POST["categoriesInput"],
                                        "REPLACE-THIS");
// 2) Processs video data (upload)

$VideoProcessor = new VideoProsessor($con);
$wasSuccessful = $VideoProcessor->upload($videoUploadData);

// 3) Check if upload was successful.
if($wasSuccessful){
    echo "Upload successful";
}

?>