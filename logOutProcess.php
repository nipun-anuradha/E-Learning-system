<?php
session_start();

$user = $_GET["u"];

if($user == "T"){
    if(isset($_SESSION["t"])){
    
        $_SESSION["t"] = null;
        session_destroy();
    }
}else if($user == "S"){
    if(isset($_SESSION["s"])){
    
        $_SESSION["s"] = null;
        session_destroy();
    }
}

echo "success";

?>