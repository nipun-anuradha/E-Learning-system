<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body class="bg-white">
<div class="container-fluid p-0 border-bottom">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>Edu Online</h1>
            </a>
        </nav>
    </div>
    
    <?php
    session_start();

    if (empty($_SESSION["s"])) {
        if(empty($_SESSION["t"])){

    ?>

    <div class="mt-5 justify-content-center text-center">
    <span class="text-black" id="l" onclick="asStudent();">As Student </span> | 
    <span class="text-secondary" id="r" onclick="asTeacher();"> As Teacher</span>
    </div>
            <div class="mt-4">
                <div class="main">
                    <div class="fw-bold justify-content-center d-flex mb-3 title">
                        <span>Login</span>
                    </div>

                    <div>
                        <label class="form-lable">Username</label>
                        <input class="form-control" type="email" id="mail" value="<?php if(isset($_COOKIE["mail"])){echo $_COOKIE["mail"];} ?>" required/>
                    </div>
                    <div>
                        <label class="form-lable">Password</label>
                        <input class="form-control" type="password" id="pw" value="<?php if(isset($_COOKIE["pass"])){echo $_COOKIE["pass"];} ?>" required/>
                    </div>

                    <br>
                    <input type="checkbox" class="form-check-input" id="rem">
                    <span>Remember Me</span>

                    <br>
                    <div class="d-grid gap-2 col-12 mx-auto">
                        <button class="btn btn-primary" id="sbtn" onclick="stuLogin();"><i class="bi bi-person"></i> Log In</button>
                        <button class="btn btn-primary d-none" id="tbtn" onclick="teaLogin();"><i class="bi bi-person-bounding-box"></i> Log In</button>
                    </div>

                    <br>
                    <div class="text-center">
                      <a href="userRegister.php?user=student" id="sr">Create new account</a>
                      <a href="userRegister.php?user=teacher" class="d-none" id="tr">Create new account</a>
                    </div>

                </div>
            </div>

    <?php

}else{
    header("Location: teacherDashboard.php");
    }
}else{
    header("Location: studentDashboard.php");
}

    ?>




    <script src="js/script.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>