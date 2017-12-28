<?php

use \modules\controllers\MainController;

class HomeController extends MainController {

    public function index() {

        $data = $_SESSION["loginStudend"];

        $arr = explode('.', $data->code_room);

        $this->model('teacher');
        $this->model('major');
        $this->model('studends');

        // data wali kelas
        $wk = $this->teacher->getWhere(array('nip' => $arr[3]));

        //  data jurusan
        $mjr = $this->major->getWhere(array('code' => $arr[1]));

        // data transaksi
        $tr = $this->studends->getJoin('transaksi', array('studends.id_studend' => 'transaksi.id_student', 'studends.nis' => $data->nis), 'RIGHT JOIN');



        $this->template(
                'home', array(
            'studend' => $data,
            'code' => array(
                'room' => $arr[2],
                'class' => $arr[0],
                'major' => $mjr[0]->stands,
                'teacher' => $wk[0]->name
        )));
    }

    public function bayar_online() {

        $error = array();
        $success = NULL;

        $data = $_SESSION["loginStudend"];

        $token = isset($_GET['token']) ? $_GET['token'] : '';

        if ($token == md5($data->nis)) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $nis = isset($_POST['transfer_nis_pengguna']) ? $_POST['transfer_nis_pengguna'] : '';
                $type = isset($_POST['transfer_bank']) ? $_POST['transfer_bank'] : '';
                $name = isset($_POST['transfer_nama_pengguna']) ? $_POST['transfer_nama_pengguna'] : '';
                $rek = isset($_POST['transfer_nomor_rekening_pengguna']) ? $_POST['transfer_nomor_rekening_pengguna'] : '';
                $nominal = isset($_POST['transfer_nominal_pengguna']) ? $_POST['transfer_nominal_pengguna'] : '';

                $foto = isset($_FILES['transfer_bukti_pembayaran']) ? $_FILES['transfer_bukti_pembayaran'] : '';

                if (!empty($foto["name"]) && $foto["type"] != 'image/jpg' && $foto["type"] != 'image/jpeg' && $foto["type"] != 'image/png') {
                    array_push($error, "Gambar hanya boleh .JPG/.PNG");
                }

                if (empty($name) || $name == "") {
                    array_push($error, "Nama Pengguna harus di isi.");
                }

                if (empty($rek) || $rek == "") {
                    array_push($error, "Nomor Rekening harus di isi.");
                }

                if (empty($nominal) || $nominal == "") {
                    array_push($error, "Nilai Nominal harus di isi.");
                }

                if (count($error) == NULL) {
                    $imageName = $foto["name"];

                    if ($foto["name"]) {

                        $imageName = date("h_i_s_Y_m_d_") . str_replace(" ", "_", $nama) . '.jpg';

                        move_uploaded_file($foto["tmp_name"], '../public/images/bukti_pembayaran/' . $imageName);
                    }
                }
            }
        } else {
            $this->back();
        }

        $this->template('transaksi_online', array(
            'studend' => $data)
        );
    }

}

?>