<?php
require "source/connection.php";

$f = $_POST["fn"];
$l = $_POST["ln"];
$e = $_POST["e"];
$c = $_POST["c"];
$sid = $_POST["sid"];

if(empty($f)){
    echo "please enter First Name";
}else if(empty($l)){
    echo "please enter Last Name";
}else if(empty($e)){
    echo "please enter email";
}else if(!filter_var($e,FILTER_VALIDATE_EMAIL)){
    echo "Invalid Email Address";
}else if(empty($c)){
    echo "please enter contact";
}else if (strlen($c) != 10) {
    echo "Invalid Mobile Number";
}else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$c)) {
    echo "Please Enter valied contact";
}else{

    Database::iud("UPDATE `student` SET fname='".$f."', lname='".$l."', email='".$e."', contact='".$c."' WHERE id='".$sid."' ");
    
    $resultset = Database::search("SELECT * FROM `student` WHERE `id`='" . $sid ."' ");
    $d = $resultset->fetch_assoc();

    session_start();
    $_SESSION["s"] = $d;


    echo "success";


}


?>