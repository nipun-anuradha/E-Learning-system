<?php
require "../source/connection.php";

$state = $_GET["s"];
$id = $_GET["id"];

Database::iud("UPDATE `student` SET `status`='".$state."' WHERE id='".$id."'  ");

echo "Student status has been changed";


?>