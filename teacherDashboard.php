<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Teacher Dashboard</title>

    <link rel="stylesheet" href="css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="css/argon.css?v=1.2.0" type="text/css">
    <link rel="stylesheet" href="css/teacherStyle.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["t"])) {
    ?>
        <!-- side panel -->
        <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
            <div class="scrollbar-inner">

                <div class="sidenav-header  align-items-center">
                    <a href="index.php">
                        <h1 class="m-3 text-uppercase fw-bold text-primary"><i class="fa fa-book-reader mr-3"></i>Edu Online</h1>
                    </a>
                </div>
                <div class="navbar-inner">

                    <div class="collapse navbar-collapse" id="sidenav-collapse-main">

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">
                                    <i class="bi bi-speedometer2"></i>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="addNotes.php">
                                    <i class="bi bi-journals"></i>
                                    <span class="nav-link-text">Add Notes</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="hostLecture.php">
                                    <i class="bi bi-book"></i>
                                    <span class="nav-link-text">Host Lecture</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="studentDetails.php">
                                    <i class="bi bi-people-fill"></i>
                                    <span class="nav-link-text">Student Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" onclick="logOut('T');">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span class="nav-link-text" >Logout</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </nav>
        <!-- side panel -->


        <div class="main-content" id="panel">
            <!-- Header -->
            <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
                <div class="container-fluid">
                    <div class="offset-11">
                        <span class="text-white col-1">Teacher</span>
                    </div>
                </div>
            </nav>
            <!-- Header -->

            <div class="header bg-primary pb-6">
                <div class="container-fluid">
                    <div class="header-body">
                        <div class="row align-items-center py-4">
                            <div class="col-lg-6 col-7">
                                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="#">Teacher Dashboard</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                        <!-- cards -->
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span class="h2 font-weight-bold mb-0">Subject</span>
                                            </div>
                                            <div class="col-auto">
                                                <div>
                                                    <?php
                                                    require "source/connection.php";
                                                    $c = Database::search("SELECT * FROM `course` WHERE id='" . $_SESSION["t"]["course_id"] . "' ");
                                                    $c_data = $c->fetch_assoc();
                                                    ?>
                                                    <span><?php echo $c_data["name"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span class="h2 font-weight-bold mb-0">Total Students</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                    <?php
                                                    $s = Database::search("SELECT count(student.id) AS num FROM `student` INNER JOIN `student_has_course` ON `student_has_course`.student_id=student.id
                                                    INNER JOIN `teacher` ON teacher.course_id=student_has_course.course_id WHERE teacher.course_id='" . $_SESSION["t"]["course_id"] . "' ");
                                                    $s_data = $s->fetch_assoc();
                                                    ?>
                                                    <span><?php echo $s_data["num"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span class="h2 font-weight-bold mb-0">Hosted Lectures</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                    <?php
                                                    $a = Database::search("SELECT count(id) AS num FROM lecture WHERE course_id='" . $_SESSION["t"]["course_id"] . "' ");
                                                    $a_data = $a->fetch_assoc();
                                                    ?>
                                                    <span><?php echo $a_data["num"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span class="h2 font-weight-bold mb-0">New Messages</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                    <span>0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- cards -->
                    </div>
                </div>
            </div>


            <div class="container2">
                <div id="day"></div>
                <div id="date"></div>
            </div>


            <script src="js/script.js"></script>
            <script>
                var date = new Date();
                var day = date.getDate();
                var year = date.getFullYear();

                var month = date.getMonth();
                var monthLabels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                var weekDay = date.getDay();
                var weekDayLabels = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

                //create function to grab day, month, date, year
                function Day() {
                    month = monthLabels[month];
                    weekDay = weekDayLabels[weekDay];

                    document.getElementById("day").innerHTML = "Today is " + "<span>" + weekDay.toUpperCase() + "</span>";
                    document.getElementById("date").innerHTML = month.toUpperCase() + " " + "<span>" + day + "</span>" + year;
                }

                Day();
            </script>
</body>

</html>
<?php
    } else {
        header("Location: index.php");
    }
?>