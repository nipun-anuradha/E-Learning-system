<?php
require "../source/connection.php";

$name = $_POST["n"];
$des = $_POST["d"];


if(empty($name)){
    echo "please enter course name";
}else if(empty($des)){
    echo "please enter description";
}else{
    $c_rs = Database::search("SELECT * FROM `course` WHERE `name`='".$name."'  ");
    if($num = $c_rs->num_rows > 0){
        echo "Course name already exists";
    }else{
        Database::iud("INSERT INTO `course` (`name`, `description`) VALUES('".$name."', '".$des."') ");
        echo "success";
    }

}





?>