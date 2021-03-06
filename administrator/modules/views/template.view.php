<?php
$page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : '';
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SMK NU Kesesi</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo PATH; ?>resources/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo PATH; ?>resources/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo PATH; ?>resources/css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo PATH; ?>resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">SMK NU Kesesi</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $data["login"]->nama_lengkap; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo SITE_URL; ?>?page=user&action=detail&id=<?php echo $data["login"]->id_user; ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="<?php echo SITE_URL; ?>?page=user&action=update&id=<?php echo $data["login"]->id_user; ?>"><i class="fa fa-fw fa-gear"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo PATH; ?>index.php?page=login&&action=logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li <?php if ($page == "" || $page == "home") echo 'class="active"'; ?>>
                            <a href="<?php echo PATH; ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="../" target="_blank"><i class="fa fa-fw fa-paper-plane"></i> Lihat Website</a>
                        </li>
                        <li <?php if ($page == "transaksi") echo 'class="active"'; ?>>
                            <a href="<?php echo PATH; ?>?page=transaksi"><i class="fa fa-fw fa-building"></i> Data Transaksi</a>
                        </li>
                        <li <?php if ($page == "teacher") echo 'class="active"'; ?>>
                            <a href="<?php echo PATH; ?>?page=teacher"><i class="fa fa-fw fa-book"></i> Data Guru</a>
                        </li>
                        <li <?php if ($page == "major") echo 'class="active"'; ?>>
                            <a href="<?php echo PATH; ?>?page=major"><i class="fa fa-fw fa-graduation-cap"></i> Jurusan</a>
                        </li>
                        <li <?php if ($page == "class") echo 'class="active"'; ?>>
                            <a href="<?php echo PATH; ?>?page=class"><i class="fa fa-fw fa-newspaper-o"></i> Data Kelas</a>
                        </li>
                        <li <?php if ($page == "rooms") echo 'class="active"'; ?>>
                            <a href="<?php echo PATH; ?>?page=rooms"><i class="fa fa-fw fa-th-large"></i> Data Ruang Kelas</a>
                        </li>
                        <li <?php if ($page == "studends") echo 'class="active"'; ?>>
                            <a href="<?php echo PATH; ?>?page=studends"><i class="fa fa-fw fa-users"></i> Data Siswa</a>
                        </li>
                        <li <?php if ($page == "settings") echo 'class="active"'; ?>>
                            <a href="<?php echo PATH; ?>?page=settings"><i class="fa fa-fw fa-phone-square"></i> Pengaturan</a>
                        </li>
                        
                        <li <?php if ($page == "user") echo 'class="active"'; ?>>
                            <a href="<?php echo PATH; ?>?page=user"><i class="fa fa-fw fa-users"></i> Manajemen User</a>
                        </li>
                        
                        
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <?php
                    $view = new View($viewName);
                    $view->bind('data', $data);
                    $view->forceRender();
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="<?php echo PATH; ?>resources/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo PATH; ?>resources/js/bootstrap.min.js"></script>

        <!-- Data Tables JavaScript -->
        <script src="<?php echo PATH; ?>resources/js/jquery.dataTables.min.js"></script>

        <!-- TinyMCE JavaScript -->
        <script src="<?php echo PATH; ?>resources/tinymce/tinymce.min.js"></script>

        <script type="text/javascript">
            tinymce.init({
                selector: ".editor"
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function () {

                $(".data-table").DataTable({
                    "language": {
                        "emptyTable": "Tidak ada data"
                    }
                });
            });
        </script>
        <script src="<?php echo PATH; ?>resources/js/add.js" type="text/javascript"></script>
    </body>

</html>
