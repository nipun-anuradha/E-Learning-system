<?php
require "source/connection.php";

$mail = $_POST["m"];
$pass = $_POST["p"];
$rem = $_POST["r"];

if (empty($mail)) {
    echo "please enter username";
} else if (strlen($mail) > 100) {
    echo "Username should contain less than 100 characters.";
} else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email Address.";
} else if (empty($pass)) {
    echo "please enter your Password";
} else if (strlen($pass) < 5 || strlen($pass) > 20) {
    echo "Ivalid Password";
} else {

    $resultset = Database::search("SELECT * FROM `student` WHERE `email`='" . $mail . "' AND `password`='" . $pass . "' ");
    $n = $resultset->num_rows;

    if ($n == 1) {
        $d = $resultset->fetch_assoc();
        if ($d["status"] == "inactive") {
            echo "Your account has been locked. Please contact admin";
        } else {
            echo "success";

            session_start();
            $_SESSION["s"] = $d;

            if ($rem == "true") {
                setcookie("mail", $mail, time() + (60 * 60 * 24 * 365));
                setcookie("pass", $pass, time() + (60 * 60 * 24 * 365));
            } else {
                setcookie("mail", "", -1);
                setcookie("pass", "", -1);
            }
        }
    } else {
        echo "Invalid Email or Password";
    }
}
