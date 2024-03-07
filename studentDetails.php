<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>

    <link rel="stylesheet" href="css/bootstrap.css" />
    <!-- <link rel="stylesheet" href="css/style.css" /> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["t"])) {
    ?>
        <div class="container-fluid p-0 mb-1 border-bottom">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
                <a href="teacherDashboard.php" class="navbar-brand ml-lg-3">
                    <h1 class="m-0 text-uppercase fw-bold text-primary"><i class="fa fa-book-reader mr-3"></i>Edu Online</h1>
                </a>
                <h3 class="offset-2 text-primary">Student Details</h3>
            </nav>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require "source/connection.php";
                    $stu_rs = Database::search("SELECT * FROM `student` INNER JOIN `student_has_course` ON student_has_course.student_id=student.id 
                WHERE course_id='" . $_SESSION["t"]["course_id"] . "'  ");
                    $stu_num = $stu_rs->num_rows;

                    for ($x = 0; $x < $stu_num; $x++) {
                        $stu_data = $stu_rs->fetch_assoc();
                    ?>
                        <tr class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $stu_data["id"]; ?> " aria-controls="collapse<?php echo $stu_data["id"]; ?>">
                            <td class="expand-button"></td>
                            <td><?php echo $stu_data["id"]; ?></td>
                            <td><?php echo $stu_data["fname"]; ?></td>
                            <td><?php echo $stu_data["lname"]; ?></td>
                            <td><?php echo $stu_data["contact"]; ?></td>
                            <td><?php echo $stu_data["email"]; ?></td>
                            <td></td>
                        </tr>

                        
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

        <script src="js/script.js"></script>
</body>

</html>

<?php
    } else {
        header("Location: index.php");
    }
?>