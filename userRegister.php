<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
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
        if (empty($_SESSION["t"])) {

            if ($_GET["user"] == "student") {
    ?>
                <div class="mt-5 justify-content-center text-center">
                    <h3 class="text-black fw-bold ">Student Registration</h3>
                </div>
                <div class="mt-4">
                    <div class="main">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-lable">First Name</label>
                                <input type="text" class="form-control" id="fn">
                            </div>
                            <div class="col-6">
                                <label class="form-lable">Last Name</label>
                                <input type="text" class="form-control" id="ln">
                            </div>
                        </div>
                        <div>
                            <label class="form-lable">Contact No</label>
                            <input class="form-control" type="text" id="con" required />
                        </div>
                        <div>
                            <label class="form-lable">E mail</label>
                            <input class="form-control" type="email" id="mail" required />
                        </div>
                        <div>
                            <label class="form-lable">Password</label>
                            <input class="form-control" type="password" id="pw" required />
                        </div>

                        <br>
                        <div class="d-grid gap-2 col-12 mx-auto">
                            <button class="btn btn-primary" id="sbtn" onclick="studentReg();"><i class="bi bi-person"></i> Sign Up</button>
                        </div>

                        <br>
                        <div class="text-center">
                            <a href="userLogin.php">Already have an account?</a>
                        </div>

                    </div>
                </div>
            <?php
            } else if ($_GET["user"] == "teacher") {
            ?>
                <div class="mt-5 justify-content-center text-center">
                    <h3 class="text-black fw-bold ">Teacher Registration</h3>
                </div>
                <div class="mt-4">
                    <div class="main">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-lable">First Name</label>
                                <input type="text" class="form-control" id="fn">
                            </div>
                            <div class="col-6">
                                <label class="form-lable">Last Name</label>
                                <input type="text" class="form-control" id="ln">
                            </div>
                        </div>
                        <div>
                            <label class="form-lable">Contact No</label>
                            <input class="form-control" type="text" id="con" required />
                        </div>
                        <div>
                            <label class="form-lable">E mail</label>
                            <input class="form-control" type="email" id="mail" required />
                        </div>
                        <div>
                            <label class="form-lable">Password</label>
                            <input class="form-control" type="password" id="pw" required />
                        </div>
                        <div>
                            <label class="form-lable">Teaching Subject</label>
                            <select class="form-select" id="cid">
                                <option value="0" selected>Select</option>
                                <?php
                                require "source/connection.php";

                                $cource_rs = Database::search("SELECT * FROM `course` ");
                                $cource_num = $cource_rs->num_rows;
                                for ($c = 0; $c < $cource_num; $c++) {
                                    $c_data = $cource_rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $c_data["id"] ?>"><?php echo $c_data["name"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <br>
                        <div class="d-grid gap-2 col-12 mx-auto">
                            <button class="btn btn-primary" id="tbtn" onclick="teacherReg();"><i class="bi bi-person-bounding-box"></i> Sign Up</button>
                        </div>

                        <br>
                        <div class="text-center">
                            <a href="userLogin.php">Already have an account?</a>
                        </div>

                    </div>
                </div>
            <?php
            } else {
                echo "Somthing went wrong!";
            }

            ?>



    <?php

        } else {
            header("Location: teacherDashboard.php");
        }
    } else {
        header("Location: studentDashboard.php");
    }

    ?>




    <script src="js/script.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>