<?php
require "source/connection.php";

$f = $_POST["f"];
$l = $_POST["l"];
$c = $_POST["c"];
$e = $_POST["e"];
$p = $_POST["p"];
$cid = $_POST["cid"];

if(empty($f)){
    echo "please enter your First Name";
}else if(strlen($f) > 20){
    echo "First Name must be less than 20 characters";
}else if(empty($l)){
    echo "please enter your Last Name";
}else if(strlen($l) > 25){
    echo "First Name must be less than 25 characters";
}else if(empty($c)){
    echo "please enter contact no";
} else if (strlen($c) != 10) {
    echo "Invalid Mobile Number";
} else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$c)) {
    echo "Please Enter Telephone";
}else if(strlen($e) >= 100){
    echo "Email must be less than 100 characters";
}else if(!filter_var($e,FILTER_VALIDATE_EMAIL)){
    echo "Invalid Email Address";
}else if(empty($p)){
    echo "please enter your Password";
}else if(strlen($p) < 8 || strlen($p) > 20){
    echo "Password sholud be between 08 and 20 characters";
}else if($cid == 0){
    echo "Please select subject";
}else{
    $r = Database::search("SELECT * FROM `teacher` WHERE `email`='".$e."' ");
    $n = $r->num_rows;

    if($n > 0){
        echo "Email Address already exists.";
    }else{

        Database::iud("INSERT INTO `teacher`(`fname`,`lname`,`contact`,`email`,`password`,`status`,`course_id`) 
        VALUES('".$f."','".$l."','".$c."','".$e."','".$p."','active','".$cid."') ");

        echo "success";
    }
}



?>