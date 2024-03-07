<!DOCTYPE html>
<html>

<head>
    <title>Admin LogIn</title>
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/style.css" />

    <style>
        body {
            background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
        }
    </style>
</head>

<body>
    <!-- admin@gmail.com | admin123 -->
    <?php
    session_start();

    if (empty($_SESSION["a"])) {

    ?>

        <div class="container">
            <div class="main">
                <h3 class="fw-bold justify-content-center d-flex mb-3">Admin Login</h3>

                <div>
                    <label class="form-lable">Username</label>
                    <input class="form-control" type="email" id="mail" value="<?php if (isset($_COOKIE["mail"])) {
                                                                                    echo $_COOKIE["mail"];
                                                                                } ?>" required />
                </div>
                <div>
                    <label class="form-lable">Password</label>
                    <input class="form-control" type="password" id="pw" value="<?php if (isset($_COOKIE["pass"])) {
                                                                                    echo $_COOKIE["pass"];
                                                                                } ?>" required />
                </div>

                <br>
                <input type="checkbox" class="form-check-input" id="rem">
                <span>Remember Me</span>

                <br>
                <div class="d-grid gap-2 col-12 mx-auto">
                    <button class="btn btn-primary" onclick="adminLogin();">Log In</button>
                </div>

            </div>
        </div>

    <?php
    } else {
        header("Location: adminPanel.php");
    }

    ?>

    <script src="js/script.js"></script>

</body>

</html>