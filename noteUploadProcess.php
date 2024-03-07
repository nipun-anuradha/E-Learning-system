<?php
require "source/connection.php";

$name = $_POST['n'];
$description = $_POST['des'];
$cid = $_POST['cid'];

if(empty($name)){
    echo "Please enter file name";
}else if(empty($description)){
    echo "Please enter file description";
}else{
    
    $targetDir = "uploads/notes/";

    $originalFileName = $_FILES["file"]["name"];
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $newFileName = $name . '.' . $fileExtension;

    $targetFile = $targetDir .  $newFileName;
    
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        Database::iud("INSERT INTO `note_file` (`name`, `description`,`path`,`course_id`) VALUES ('" . $name . "', '" . $description . "', '" . $targetFile . "', '".$cid."') ");
        
        echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }


}




?>