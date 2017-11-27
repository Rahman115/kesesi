<?php
$page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : '';
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SMK NU Kesesi</title>

        <!-- CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles -->
        <link href="vendor/css/style.css" rel="stylesheet">

    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">SMK NU Kesesi</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="?page=login&&action=logout">Keluar
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <!-- Page Content -->
        <div class="container">
            <!-- Call to Action Well -->
            <div class="card text-white bg-secondary my-4 text-center">
                <div class="card-body">
                    <p class="text-white m-0">Sistem Informasi SPP SMK NU Kesesi</p>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    $view = new View($viewName);
                    $view->bind('data', $data);
                    $view->forceRender();
                    ?>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>