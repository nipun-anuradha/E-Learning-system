<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Teacher</title>

    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- <style>
        body {
            background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
        }
    </style> -->
</head>

<body class="bg-white">
    <div class="container-fluid p-0 mb-1 border-bottom">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase fw-bold text-primary"><i class="fa fa-book-reader mr-3"></i>Edu Online</h1>
            </a>
            <h3 class="offset-2 text-primary">Manage Teachers</h3>
        </nav>
    </div>

    <div class="row m-2 mb-3">

        <div class="col-4">
            <label class="form-label fw-bold col-12">Courses :</label>
            <!-- bg-dark text-light -->
            <select class="form-select " size="5" id="course">
                <?php
                require "../source/connection.php";
                $grade_rs = Database::search("SELECT * FROM  `course` ");
                $grade_num = $grade_rs->num_rows;

                for ($x = 0; $x < $grade_num; $x++) {
                    $grade_data = $grade_rs->fetch_assoc();
                ?>
                    <option value="<?php echo $grade_data["id"]; ?>" onclick="loadDetails(<?php echo $grade_data['id']; ?>);"><?php echo $grade_data["name"]; ?></option>
                <?php

                }

                ?>
            </select>
        </div>

        <div class="col-8">
            <label class="form-label fw-bold">Details :</label>
            <div id="details">
                <h3>N/A</h3>
            </div>
        </div>
    </div>

    <table class="table">
        <thead class="table-dark">
            <th>Id</th>
            <th>Frist Name</th>
            <th>Last Name</th>
            <th>Contact No</th>
            <th>E-mail</th>
            <th>Course</th>
            <th>Status</th>
            <th></th>
        </thead>
        <tbody>
            <?php
            $tea_rs = Database::search("SELECT * FROM  `teacher` INNER JOIN `course` ON `teacher`.`course_id`=`course`.`id` ");
            $tea_num = $tea_rs->num_rows;

            for ($x = 0; $x < $tea_num; $x++) {
                $tea_data = $tea_rs->fetch_assoc();
            ?>
                <tr>
                    <td><?php echo $tea_data["id"]; ?></td>
                    <td><?php echo $tea_data["fname"]; ?></td>
                    <td><?php echo $tea_data["lname"]; ?></td>
                    <td><?php echo $tea_data["contact"]; ?></td>
                    <td><?php echo $tea_data["email"]; ?></td>
                    <td><?php echo $tea_data["name"]; ?></td>
                    <td><?php echo $tea_data["status"]; ?></td>
                    <td>
                        <?php
                        if ($tea_data["status"] == "inactive") {
                        ?>
                            <button class="btn btn-danger" onclick="teacherState('active', <?php echo $tea_data['id']; ?>);"><i class="bi bi-lock-fill"></i></button>
                        <?php
                        } else {
                        ?>
                            <button class="btn btn-success" onclick="teacherState('inactive', <?php echo $tea_data['id']; ?>);"><i class="bi bi-unlock-fill"></i></button>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
            <?php

            }

            ?>
        </tbody>
    </table>
    <script src="js/script.js"></script>
</body>

</html>