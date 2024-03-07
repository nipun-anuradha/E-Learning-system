<?php
require "../source/connection.php";

$cid = $_GET["cid"];

$d_rs = Database::search("SELECT count(id) AS num FROM `teacher` WHERE course_id='".$cid."'  ");

while($result_data = $d_rs->fetch_assoc()){
    echo $result_data["num"];
}





?>