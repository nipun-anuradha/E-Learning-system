<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Notes</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,500&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />

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
                <h3 class="offset-2 text-primary">Add Lecture Notes</h3>
            </nav>
        </div>

        <div class="container border">
            <div class="row m-2">

                <div class="col-6">
                    <div>
                        <label for="cname" class="form-label">File Name</label>
                        <input type="text" class="form-control form-control-sm" id="name">
                    </div>
                </div>

                <div class="col-6">
                    <div>
                        <label for="formFileSm" class="form-label">Select file</label>
                        <input class="form-control form-control-sm" id="notefile" type="file">
                    </div>
                </div>

                <div class="col-12">
                    <label for="cname" class="form-label">Description</label>
                    <input type="text" class="form-control form-control-sm" id="dec">
                </div>
                <div class="mt-3">
                    <button class="btn btn-outline-primary" onclick="uploadNote(<?php echo $_SESSION['t']['course_id']; ?>);">Upload</button>
                </div>

            </div>
        </div>

        <div class="container mt-5">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">File Id</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">File</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require "source/connection.php";
                    $c = Database::search("SELECT * FROM `note_file` WHERE course_id='" . $_SESSION["t"]["course_id"] . "' ");
                    while ($c_data = $c->fetch_assoc()) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $c_data["id"]; ?></th>
                            <td><?php echo $c_data["name"]; ?></td>
                            <td><?php echo $c_data["description"]; ?></td>
                            <td><a href="<?php echo $c_data["path"]; ?>" target="_blank">Download</a></td>
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