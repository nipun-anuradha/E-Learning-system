<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body class="sb-nav-fixed">
    <?php
    session_start();
    if (isset($_SESSION["s"])) {
        $sid = $_SESSION["s"]["id"];
    ?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

            <h3 class="m-0 text-uppercase text-primary fw-bold"><i class="fa fa-book-reader mr-3"></i>Edu Online </h3>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>

            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="" onclick="logOut('S');">LogOut</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav mt-5">
                            <a class="nav-link" href="">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="findCourse.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-zoom-in"></i></div>
                                Find Courses
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Courses
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <?php
                                require "source/connection.php";
                                $s_rs = Database::search("SELECT * FROM `student_has_course` INNER JOIN `course` ON `student_has_course`.course_id=`course`.id 
                                WHERE student_has_course.student_id='" . $sid . "' ");
                                $s_num = $s_rs->num_rows;
                                for ($x = 0; $x < $s_num; $x++) {
                                    $s_data = $s_rs->fetch_assoc();
                                ?>
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="followedCourse.php"><?php echo $s_data["name"]; ?></a>
                                    </nav>
                                <?php
                                }
                                ?>

                            </div>

                            <a class="nav-link" href="" onclick="logOut('S');">
                                <div class="sb-nav-link-icon"><i class="bi bi-box-arrow-right"></i></div>
                                Log Out
                            </a>

                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Student</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats border-warning" style="color: #ffc107;">
                                    <div class="card-body hovB">
                                        <div>
                                            <div class="text-center">
                                                <span class="fs-5 mb-0">Folliwing Courses</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="text-center">
                                                    <?php
                                                    $course = Database::search("SELECT count(student_id) AS id FROM `student_has_course` WHERE student_id='" . $sid . "' ");
                                                    $ccount = $course->fetch_assoc();
                                                    ?>
                                                    <h3><?php echo $ccount["id"]; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats border-primary blockhov">
                                    <div class="card-body">
                                        <div>
                                            <div class="text-center">
                                                <span class="fs-5 mb-0">UpComing Lectures</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="text-center">
                                                    <?php
                                                    $lec = Database::search("SELECT COUNT(`lecture`.id) AS id FROM `lecture`INNER JOIN `course` ON `lecture`.course_id=`course`.id
                                                    INNER JOIN `student_has_course` ON `student_has_course`.course_id=`course`.id 
                                                    WHERE student_id='" . $sid . "' ");
                                                    $clec = $lec->fetch_assoc();
                                                    ?>
                                                    <h3><?php echo $clec["id"]; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats border-primary blockhov">

                                    <div class="card-body">
                                        <div>
                                            <div class="text-center">
                                                <span class="fs-5 mb-0">Messages</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="text-center">
                                                    <h3>0</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats border-primary blockhov">
                                    <div class="card-body">
                                        <div>
                                            <div class="text-center">
                                                <span class="fs-5 mb-0">Notifications</span>
                                                <h3>0</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="text-center">
                                                    <?php
                                                    // $gid = $s_data["grade_id"];
                                                    // $fs = Database::search("SELECT count(id) AS num FROM `subject` WHERE `grade_id`='".$gid."' ");
                                                    // $fs_data = $fs->fetch_assoc();
                                                    ?>
                                                    <h3><?php
                                                        // echo $fs_data["num"]; 
                                                        ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=" mt-5 tclr">
                            <h4 class="m-2">Student Profile</h4>
                            <hr>
                            <div class="row m-1">
                                <div class="col-5">
                                    <h6>Student Index :</h6>
                                </div>
                                <div class="col-5">
                                    <input type="text" class="input-group input-group-sm" value="<?php echo $sid ?>" disabled>
                                </div>
                            </div>
                            <div class="row m-1">
                                <div class="col-5">
                                    <h6>Student Name :</h6>
                                </div>
                                <div class="col-5">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" class="input-group input-group-sm" id="fname" value="<?php echo $_SESSION["s"]["fname"]; ?>" disabled>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="input-group input-group-sm" id="lname" value="<?php echo $_SESSION["s"]["lname"]; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-1">
                                <div class="col-5">
                                    <h6>Student Email :</h6>
                                </div>
                                <div class="col-5">
                                    <input type="text" class="input-group input-group-sm" id="smail" value="<?php echo $_SESSION["s"]["email"]; ?>" disabled>
                                </div>
                            </div>
                            <div class="row m-1">
                                <div class="col-5">
                                    <h6>Student Contact :</h6>
                                </div>
                                <div class="col-5">
                                    <input type="text" class="input-group input-group-sm" id="scontact" value="<?php echo $_SESSION["s"]["contact"]; ?>" disabled>
                                </div>
                            </div>
                            <div class="m-3">
                                <button class="btn btn-outline-primary btn-sm" onclick="enableFeilds();">Edit</button>
                                <button class="btn btn-primary btn-sm" onclick="updateDetails(<?php echo $sid ?>);">Save</button>
                            </div>
                            <hr>

                        </div>

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Edu Online</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
<?php
    } else {
        header("Location: index.php");
    }
?>