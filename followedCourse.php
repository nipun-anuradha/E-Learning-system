<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Followed Course</title>

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
                            <a class="nav-link" href="studentDashboard.php">
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
                                        <a class="nav-link" href="#"><?php echo $s_data["name"]; ?></a>
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
                        <h1 class="mt-4">My Courses</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">your active courses</li>
                        </ol>


                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stu_rs = Database::search("SELECT * FROM `course` INNER JOIN `student_has_course` ON `student_has_course`.course_id=`course`.id 
                                    WHERE student_id='" . $sid . "' ");
                                    $stu_num = $stu_rs->num_rows;

                                    for ($y = 0; $y < $stu_num; $y++) {
                                        $stu_data = $stu_rs->fetch_assoc();
                                    ?>
                                        <tr class="accordion-toggle collapsed cursor" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $stu_data["id"]; ?> " aria-controls="collapse<?php echo $stu_data["id"]; ?>">
                                            <td class="expand-button"></td>
                                            <td class="fw-bold"><?php echo $stu_data["name"]; ?></td>
                                        </tr>
                                        <tr class="hide-table-padding">
                                            <td colspan="3">
                                                <div id="collapse<?php echo $stu_data["id"]; ?>" class="collapse in p-3">
                                                    <h6 class="border">Notes</h6>
                                                    <ol>
                                                        <?php
                                                        $n_rs = Database::search("SELECT * FROM `note_file` WHERE `course_id`='" . $stu_data["id"] . "' ");
                                                        while ($data = $n_rs->fetch_assoc()) {
                                                        ?>
                                                            <li><a href="<?php echo $data['path']; ?>" target="_blank"><?php echo $data['name']; ?></a></li>
                                                        <?php
                                                        }
                                                        ?>
                                                    </ol>

                                                    <h6 class="border">Lecture Shedule</h6>
                                                    <ol>
                                                        <?php
                                                        $s_rs = Database::search("SELECT * FROM `lecture` WHERE `course_id`='" . $stu_data["id"] . "' ");
                                                        while ($sdata = $s_rs->fetch_assoc()) {
                                                        ?>
                                                            <li><b><?php echo $sdata['date'] ." | ". $sdata['time']; ?></b> <a href="<?php echo $sdata['link']; ?>" target="_blank"><?php echo $sdata['link']; ?></a></li>
                                                        <?php
                                                        }
                                                        ?>
                                                        
                                                    </ol>
                                                </div>
                                            </td>

                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
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