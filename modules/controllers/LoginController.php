<?php

class LoginController extends Controller {

    public function index() {
        
        $login = isset($_SESSION["loginStudend"]) ? $_SESSION["loginStudend"] : '';
        if ($login) {
            $this->redirect("index.php");
        }

        $message = array();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $message = array(
                'success' => FALSE,
                'message' => 'Maaf Username/Password anda salah'
            );

            $username = isset($_POST["username"]) ? $_POST["username"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";

            $this->model('studends');

            if ($username == $password) {
                $user = $this->studends->getWhere(array('nis' => $password));

                if (count($user) > 0) {
                    $message = array(
                        'success' => TRUE,
                        'message' => 'Selamat, anda berhasil login'
                    );

                    $_SESSION["loginStudend"] = $user[0];

                    echo '<meta http-equiv="refresh" content="1; url=index.php" >';
                }
            }
        }

        $view = $this->view('login')->bind('message', $message);
    }
    
    public function logout() {
        unset($_SESSION["loginStudend"]);
        $this->redirect('index.php'); 
    }

}

?>