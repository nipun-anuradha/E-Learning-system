<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" /> -->
    <title>Manage Course</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,500&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <style>
        html {
            font-size: 14px;
        }

        .container {
            font-size: 14px;
            color: #666666;
            font-family: "Open Sans";
        }

        .card-custom {
            overflow: hidden;
            min-height: 250px;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
        }
		
		.card-custom:hover{
			box-shadow: 0 0 10px #2a333b;
		}

        .card-custom-img {
            height: 200px;
            min-height: 200px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-color: inherit;
        }

        /* First border-left-width setting is a fallback */
        .card-custom-img::after {
            position: absolute;
            content: '';
            top: 161px;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-top-width: 40px;
            border-right-width: 0;
            border-bottom-width: 0;
            border-left-width: 545px;
            border-left-width: calc(575px - 5vw);
            border-top-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            border-left-color: inherit;
        }

        .card-custom-avatar img {
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
            position: absolute;
            top: 100px;
            left: 1.25rem;
            width: 100px;
            height: 100px;
        }
    </style>
</head>


<body>
    <div class="container-fluid p-0 mb-1 border-bottom">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase fw-bold text-primary"><i class="fa fa-book-reader mr-3"></i>Edu Online</h1>
            </a>
            <h3 class="offset-2 text-primary">Manage Courses</h3>
        </nav>
    </div>

    <div class="container border">
        <div class="row">
            <label for="cname" class="form-label">Course Name</label>
            <div class="col-10">
                <input type="text" class="form-control" id="cname">
            </div>
            <div class="col-2 d-flex justify-content-end">
                <button class="btn btn-outline-primary" onclick="addCourse();">Add Course</button>
            </div>
        </div>
        <div class="mb-3">
            <label for="des" class="form-label">Description</label>
            <textarea class="form-control" id="des" rows="3"></textarea>
        </div>
    </div>


    <div class="container">
        <div class="row pt-5 m-auto">

            <?php
            require "../source/connection.php";
            $tea_rs = Database::search("SELECT * FROM  `course` ");
            $tea_num = $tea_rs->num_rows;

            for ($x = 0; $x < $tea_num; $x++) {
                $tea_data = $tea_rs->fetch_assoc();
            ?>
                <div class="col-md-6 col-lg-3 pb-3">
                    <div class="card card-custom bg-white border-white border-0">
                        <div class="card-custom-img" style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);"></div>
                        <div class="card-custom-avatar">
                            <img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />
                        </div>
                        <div class="card-body" style="overflow-y: auto">
                            <h4 class="card-title"><?php echo $tea_data["name"]; ?></h4>
                            <p class="card-text"><?php echo $tea_data["description"]; ?></p>
                        </div>
                        <div class="card-footer" style="background: inherit; border-color: inherit;">
                            <a href="#" class="btn btn-outline-danger">Option</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>


    <script src="js/script.js"></script>

</body>




</html>