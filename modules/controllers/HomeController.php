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

        $this->model('transaksi');

        $data = $_SESSION["loginStudend"];

        $token = isset($_GET['token']) ? $_GET['token'] : '';

        if ($token == md5($data->nis)) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $nis = isset($_POST['transfer_nis_pengguna']) ? $_POST['transfer_nis_pengguna'] : '';
                $status = isset($_POST['transfer_status']) ? $_POST['transfer_status'] : '';
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
//
                        $imageName = date("h_i_s_Y_m_d_") . str_replace(" ", "_", $nis) . '.jpg';
//
                        move_uploaded_file($foto["tmp_name"], 'public/images/bukti_pembayaran/' . $imageName);
                    }

                    $INSERT = $this->transaksi->insert(array(
                        'id_transaksi' => '',
                        'id_student' => $nis,
                        'date_transaksi' => date('Y-m-d'),
                        'status_transaksi' => $status,
                        'jenis_transaksi' => "ONLINE_CONFIRM",
                        'price' => $nominal,
                        'exp' => $type."/".$rek."/".$name."/".$imageName
                            )
                    );

                    if ($INSERT) {
                        $success = "BERHASIL MELAKUKAN TRANSAKSI";
                    }
                }
            }
        } else {
            $this->back();
        }

        $this->template('transaksi_online', array(
            'studend' => $data,
            'error' => $error,
            'success' => $success
                )
        );
    }

    public function detail_pembayaran(){

        $token = isset($_GET['token']) ? $_GET['token'] : '';

        $this->model('transaksi');
        $this->model('studends');
        $this->model('settings');

        $set = $this->settings->get();

        // var_dump($set[0]);

        $dataSPP = $this->transaksi->query("SELECT SUM(transaksi.price) AS PRICE "
                        . "FROM transaksi "
                        . "JOIN studends ON transaksi.id_student = studends.nis "
                        . "WHERE transaksi.status_transaksi = 'SPP' "
                        . "AND transaksi.id_student = '{$_SESSION['loginStudend']->nis}'");

        $dataSYARIAH = $this->transaksi->query("SELECT SUM(transaksi.price) AS PRICE FROM transaksi "
                        . "JOIN studends ON transaksi.id_student = studends.nis "
                        . "WHERE transaksi.status_transaksi = 'SYARIAH' "
                        . "AND transaksi.id_student = '{$_SESSION['loginStudend']->nis}'");


        $dataGENAP = $this->transaksi->query("SELECT SUM(transaksi.price) AS PRICE FROM transaksi "
                        . "RIGHT JOIN studends ON transaksi.id_student = studends.nis "
                        . "WHERE transaksi.status_transaksi = 'PRAKTEK' "
                        . "AND transaksi.jenis_transaksi = 'SEMESTER_GENAP' "
                        . "AND transaksi.id_student = '{$_SESSION['loginStudend']->nis}'");


        $dataGANJIL = $this->transaksi->query("SELECT SUM(transaksi.price) AS PRICE FROM transaksi "
                        . "RIGHT JOIN studends ON transaksi.id_student = studends.nis "
                        . "WHERE transaksi.status_transaksi = 'PRAKTEK' "
                        . "AND transaksi.jenis_transaksi = 'SEMESTER_GANJIL' "
                        . "AND transaksi.id_student = '{$_SESSION['loginStudend']->nis}'");


        
        $arr = array(
        'spp' => $dataSPP[0],
        'syariah' => $dataSYARIAH[0],
        'sGenap' => $dataGENAP[0],
        'sGanjil' => $dataGANJIL[0]
            );


        $data = $this->studends->getJoin('transaksi',array('studends.nis' => 'transaksi.id_student'),"JOIN",array('nis' => $_SESSION['loginStudend']->nis));
        $dataSiswa = $this->studends->get(array('nis' => $_SESSION['loginStudend']->nis));

        // var_dump($dataGANJIL);



        $this->template('datail_pembayaran', array('siswa' => $data, 'harga' => $arr, 'set' => $set[0], 'dataSiswa' => $dataSiswa[0]));
    }

}

?>