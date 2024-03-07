<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edu Online</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="img/favicon.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="css/bootstrap1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>Edu Online</h1>
            </a>

            <div class="collapse navbar-collapse px-lg-3">
                <a href="userLogin.php" class="btn btn-primary py-2 px-4 d-none d-lg-block">Log In</a>
            </div>
        </nav>
    </div>



    <!-- Header-->
    <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
            <h1 class="text-white display-1 mb-5">EDU ONLINE</h1>
            <h1 class="text-white mt-4 mb-4">E-Learning management system</h1>
        </div>
    </div>
    <!-- Header-->



    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/ostu.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <p class="text-primary"><b>We manage all students and teachers with there cources. Student can do assignments and reafer all notes through this system. Teachers can give marks and monitor students</b></p>
                    <div class="row pt-3 mx-0">
                        <div class="col-3 px-0">
                            <div class="bg-success text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up"><i class="bi bi-journal-richtext"></i></h1>
                                <h6 class="text-uppercase text-white">Cources</h6>
                            </div>
                        </div>
                        <div class="col-3 px-0">
                            <div class="bg-primary text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up"><i class="bi bi-journals"></i></h1>
                                <h6 class="text-uppercase text-white">Notes</h6>
                            </div>
                        </div>
                        <div class="col-3 px-0">
                            <div class="bg-danger text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up"><i class="bi bi-book"></i></h1>
                                <h6 class="text-uppercase text-white">Exams</h6>
                            </div>
                        </div>
                        <div class="col-3 px-0">
                            <div class="bg-warning text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up"><i class="bi bi-journal-check"></i></h1>
                                <h6 class="text-uppercase text-white">Results</h6>
                            </div>
                        </div>

                        <h2 class="mt-5 text-primary">Login with creating account</h2>
                    </div>
                    <div class="row">
                        <a href="userRegister.php?user=student" class="btn btn-outline-primary m-1">STUDENT</a>
                        <a href="userRegister.php?user=teacher" class="btn btn-outline-primary m-1">TEACHER</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Footer Start -->
    <div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>EDU ONLINE</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Available Access</h3>
                    <p>Teachers</p>
                    <p>Students</p>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Features</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <p>Online cources</p>
                        <p>Assignments</p>
                        <p>Notes</p>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Contact admin</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a href="mailto:admin@example.com">Send mail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 border-top py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0">Copyright &copy; EDU ONLINE. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
</body>

</html>