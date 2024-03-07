<?php
require "source/connection.php";

$sid = $_GET["s"];
$cid = $_GET["c"];


if(empty($sid) & empty($cid)){
    echo "Something went wrong";
}else{
    
        Database::iud("INSERT INTO `student_has_course` (`student_id`, `course_id`) VALUES('".$sid."', '".$cid."') ");
        echo "success";

}





?>