<?php
require "../source/connection.php";

$state = $_GET["s"];
$id = $_GET["id"];

Database::iud("UPDATE `teacher` SET `status`='".$state."' WHERE id='".$id."'  ");

echo "success";


?>