<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Student</title>

    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <style>
        tr.hide-table-padding td {
            padding: 0;
        }

        .expand-button {
            position: relative;
        }

        .accordion-toggle .expand-button:after {
            position: absolute;
            left: .75rem;
            top: 50%;
            transform: translate(0, -50%);
            content: '-';
        }

        .accordion-toggle.collapsed .expand-button:after {
            content: '+';
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0 mb-1 border-bottom">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase fw-bold text-primary"><i class="fa fa-book-reader mr-3"></i>Edu Online</h1>
            </a>
            <h3 class="offset-2 text-primary">Manage Student</h3>
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
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                require "../source/connection.php";
                $stu_rs = Database::search("SELECT * FROM `student` ");
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
                        <td><?php echo $stu_data["status"]; ?></td>
                        <td></td>
                    </tr>
                    <tr class="hide-table-padding " >
                        <td ></td>
                        <td colspan="3">
                            <div id="collapse<?php echo $stu_data["id"]; ?>" class="collapse in p-3">
                                <div class="row" >
                                    <div class="col-4">
                                        <img src="../img/newUser.svg" alt="" width="100px">
                                    </div>
                                    <div class="col-6">
                                        <h6>Following courses</h6>
                                        <ul>
                                            <?php
                                            $c_rs = Database::search("SELECT * FROM `course` INNER JOIN `student_has_course` ON `student_has_course`.course_id=`course`.id 
                                            WHERE student_id='" . $stu_data["id"] . "' ");
                                            $c_num = $c_rs->num_rows;
                                            if ($c_num == 0) {
                                            ?>
                                                <li>N/A</li>
                                            <?php
                                            }

                                            for ($y = 0; $y < $c_num; $y++) {
                                                $c_data = $c_rs->fetch_assoc();
                                            ?>
                                                <li><?php echo $c_data["name"]; ?></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="col-2">
                                        <?php
                                        if ($stu_data["status"] == "inactive") {
                                        ?>
                                            <button class="btn btn-danger" onclick="studentState('active', <?php echo $stu_data['id']; ?>);"><i class="bi bi-lock-fill"></i></button>
                                        <?php
                                        } else {
                                        ?>
                                            <button class="btn btn-success" onclick="studentState('inactive', <?php echo $stu_data['id']; ?>);"><i class="bi bi-unlock-fill"></i></button>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>