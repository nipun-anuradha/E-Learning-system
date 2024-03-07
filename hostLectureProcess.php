<?php
require "source/connection.php";

$url = $_POST["url"];
$date = $_POST["date"];
$time = $_POST["time"];
$cid = $_POST["cid"];

if(empty($url)){
    echo "Please enter meeting url";
}else if(empty($date)){
    echo "Please select date";
}else if($time == "00:00"){
    echo "Please select time";
}else{

    Database::iud("INSERT INTO `lecture` (`date`,`time`,link,course_id) VALUES('".$date."','".$time."','".$url."','".$cid."'); ");

    echo "New Lecture has been sheduled";

}


?>