<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Host Lecture</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,500&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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
                <h3 class="offset-2 text-primary">Host Lectures</h3>
            </nav>
        </div>

        <div class="container border">
            <div class="row m-2">

                <div class="col-12">
                    <label  class="form-label">Meeting Url</label>
                    <input type="text" class="form-control form-control-sm" id="url">
                </div>

                <div class="col-6">
                    <div>
                        <label class="form-label">Select Date</label>
                        <input type="date" class="form-control form-control-sm" id="date">
                    </div>
                </div>

                <div class="col-6">
                    <div>
                        <label class="form-label">Select Time</label>
                        <input type="time" class="form-control form-control-sm" id="selectedTime" value="00:00">
                    </div>
                </div>


                <div class="mt-3">
                    <button class="btn btn-outline-primary" onclick="hostLecture(<?php echo $_SESSION['t']['course_id']; ?>);">Add</button>
                </div>

            </div>
        </div>

        <div class="container mt-5">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date / Time</th>
                        <th scope="col">Meeting Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require "source/connection.php";
                    $c = Database::search("SELECT * FROM `lecture` WHERE course_id='" . $_SESSION["t"]["course_id"] . "' ");
                    while ($c_data = $c->fetch_assoc()) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $c_data["id"]; ?></th>
                            <td><?php echo $c_data["date"]. " | " .$c_data["time"]; ?></td>
                            <td><a href="<?php echo $c_data["link"]; ?>" target="_blank">launch meeting</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>



        <script src="js/script.js"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Flatpickr for time selection
            flatpickr("#selectedTime", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            });
        });

        function submitForm() {
            var selectedDate = document.getElementById("selectedDate").value;
            var selectedTime = document.getElementById("selectedTime").value;

            // Perform additional client-side validation if needed
            
            // Send the selected date and time to the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
            };
            xhr.open("POST", "process.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("selectedDate=" + selectedDate + "&selectedTime=" + selectedTime);
        }
    </script>

</body>




</html>

<?php
    } else {
        header("Location: index.php");
    }
?>