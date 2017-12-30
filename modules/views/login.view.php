<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SMK NU Kesesi</title>

        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/css/style_login.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>

        <div class="container">
            <form class="form-signin" method="POST">
                <div class="form-group">
                    <div class="text-center text-header">
                        <h1>SMK NU Kesesi</h1>
                        <img src="public/images/logo.jpg" height="100" alt=""/>
                        <h2>Login Siswa</h2>
                    </div>
                </div>
                <hr>
                <?php
                if (count($message)) {
                    ?>

                    <div class="alert <?php
                    if ($message["success"] == false)
                        echo "alert-danger";
                    else
                        echo "alert-success";
                    ?>"><?php echo $message["message"]; ?></div>

                    <?php
                }
                ?>
                <div class="form-group">

                    <label for="input-username">Username</label>
                    <input type="text" id="input-username" name="username" class="form-control" placeholder="Masukkan NIS" required autofocus>
                </div>
                <div class="form-group">

                    <label for="input-password">Password</label>
                    <input type="password" name="password" id="input-password" class="form-control" placeholder="Sesuai NIS" required>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Masuk</button>

                <hr>
                Lupa password <a href="#">tanya</a>
            </form>

        </div>
    </body>
</html>


