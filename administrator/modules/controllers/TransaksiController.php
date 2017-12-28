<?php

use \modules\controllers\MainController;

class TransaksiController extends MainController {

    public function index() {



        $this->model('transaksi');
        $this->model('studends');

        $data = NULL;


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $code = isset($_POST['search_name']) ? $_POST['search_name'] : ''; //$_POST['kelas'] . "." . $_POST['jurusan'] . "." . $_POST['ruang'];

            $this->model('rooms');

            $code_rooms = $this->rooms->getWhere(array('room' => $code));

            $data = $this->transaksi->getJoin('studends', array('transaksi.id_student' => 'studends.nis'), 'RIGHT JOIN', null, array('studends.name' => $code));
        }


        $this->template('transaksi', array('transaksi' => $data));
    }

    public function kelas() {

        $this->model('rooms');


        $kelas = isset($_GET['kelas']) ? $_GET['kelas'] : '';

        $data = $this->rooms->getJoin('teacher', array('teacher_code' => 'nip'));

        for ($i = 0; $i < count($data); $i++) {
            $ex = explode('.', $data[$i]->room);
            if ($ex[0] == $kelas) {
                $data_new[$i] = $data[$i];
            }
        }

        $this->template('transaksi_kelas', array('activ' => $kelas, 'rooms' => $data_new));
    }

    public function rooms() {

        $this->model('rooms');
        $this->model('studends');

        $wl_exp = isset($_GET['wl']) ? $_GET['wl'] : "";
        $wl = explode(".", $wl_exp);

        $mj_exp = isset($_GET['major']) ? $_GET['major'] : "";
        $mj = explode(".", $mj_exp);

        $data = $this->studends->get();
        $data_rooms = $this->rooms->get();

        $data_rooms_new = NULL;

        for ($j = 0; $j < count($data_rooms); $j++) {
            $ex = explode('.', $data_rooms[$j]->room);
            if ($ex[0] == $wl[0] && $ex[1] == $mj[0]) {

                $data_rooms_new[$j] = $data_rooms[$j];
            }
        }

        for ($i = 0; $i < count($data); $i++) {
            $exp = explode(".", $data[$i]->code_room);
            if ($exp[3] == $wl[1]) {
                $data_new[$i] = $data[$i];
            }
        }

        $this->template('transaksi_rooms', array('activ' => $data_new, 'rm' => $data_rooms_new));
    }

    public function pembayaran() {



        $this->model('studends');
        $this->model('transaksi');

        $error = array();
        $success = NULL;
        $myId = NULL;
        $pembayaran = NULL;

        $pembayaran = isset($_GET['pembayaran']) ? $_GET['pembayaran'] : '';
        $ID = isset($_GET['ID']) ? $_GET['ID'] : '';


        $data = $this->studends->getWhere(array('nis' => $ID));
        $tr = $this->transaksi->get();
        $simTr = $this->transaksi->rows();

        $data_tr = $this->transaksi->getWhere(array('id_student' => $ID));

        $PEMBAYARAN_SYARIAH = $this->transaksi->query("SELECT SUM(transaksi.price) AS PRICE FROM transaksi "
                . "RIGHT JOIN studends ON transaksi.id_student = studends.nis "
                . "WHERE transaksi.status_transaksi = 'SYARIAH' AND transaksi.id_student = '{$ID}'");
        $EXP_SYARIAH = $this->transaksi->query("SELECT transaksi.exp AS EXP FROM transaksi "
                . "RIGHT JOIN studends ON transaksi.id_student = studends.nis "
                . "WHERE transaksi.status_transaksi = 'SYARIAH' AND transaksi.id_student = '{$ID}' "
                . "ORDER BY transaksi.exp DESC LIMIT 1");

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $post[0] = isset($_POST['transaksi_id']) ? $_POST['transaksi_id'] : '';
            $post[1] = isset($_POST['transaksi_type']) ? $_POST['transaksi_type'] : '';
            $post[2] = isset($_POST['transaksi_price']) ? $_POST['transaksi_price'] : '';
            $post[3] = isset($_POST['transaksi_explanation']) ? $_POST['transaksi_explanation'] : '';
            $post[4] = isset($_POST['transaksi_date']) ? $_POST['transaksi_date'] : '';
            $post[5] = isset($_POST['transaksi_jenis']) ? $_POST['transaksi_jenis'] : '';
//            $post[4] = isset($_POST['simpan_data']) ? $_POST['simpan_data'] : '';

            if (empty($post) || !is_array($post)) {
                array_push($error, "Data belum lengkap");
            }

            if ($post[1] == 'SYARIAH') {
                if ($PEMBAYARAN_SYARIAH[0]->PRICE == NULL && $post[2] < '2500000') {
                    $post[3] = 'BELUM_LUNAS';
                } else if ($PEMBAYARAN_SYARIAH[0]->PRICE != NULL) {
                    $syariah = $PEMBAYARAN_SYARIAH[0]->PRICE + $post[2];
                    if ($syariah < '2500000') {
                        $post[3] = 'BELUM_LUNAS';
                    } else if ($syariah == '2500000') {
                        $post[3] = 'LUNAS';
                    } else if ($syariah > '2500000') {
                        array_push($error, "Data Harga yang di inputkan lebih");
                    }
                }
            }

            if ($post[1] == 'PRAKTEK') {
                $examp = $this->transaksi->query("SELECT SUM(transaksi.price) AS PRICE FROM transaksi 
                    RIGHT JOIN studends ON transaksi.id_student = studends.nis
                    WHERE transaksi.status_transaksi = 'PRAKTEK' 
                        AND transaksi.jenis_transaksi = '{$post[5]}' 
                        AND transaksi.id_student = '{$post[0]}'");
                if ($examp[0]->PRICE == NULL && $post[2] < '200000') {
                    $post[3] = 'BELUM_LUNAS';
                } else if ($examp[0]->PRICE == NULL && $post[2] == '200000') {
                    $post[3] = 'LUNAS';
                } else if ($examp[0]->PRICE == NULL && $post[2] > '200000') {
                    array_push($error, "Data Harga yang di inputkan lebih");
                } else if ($examp[0]->PRICE != NULL) {
                    $total = $examp[0]->PRICE + $post[2];
                    if ($total < '200000') {
                        $post[3] = 'BELUM_LUNAS';
                    } else if ($total == '200000') {
                        $post[3] = 'LUNAS';
                    } else if ($total > '200000') {
                        array_push($error, "Data Harga yang di inputkan lebih");
                    }
                }
            }
            if ($error == NULL) {

                $arr = array(
                    'id_transaksi' => '',
                    'id_student' => $post[0],
                    'date_transaksi' => $post[4],
                    'status_transaksi' => $post[1],
                    'jenis_transaksi' => $post[5],
                    'price' => $post[2],
                    'exp' => $post[3]
                );

                $INS = $this->transaksi->insert($arr);

                if ($INS) {
                    $success = "Data berhasil disimpan";
                }
            }
        }

        $this->template('transaksi_pembayaran', array(
            'siswa' => $data[0],
            'tr' => $data_tr,
            'error' => $error,
            'success' => $success,
            'pembayaran' => $pembayaran,
            'syariah' => $PEMBAYARAN_SYARIAH,
            'exp_syariah' => $EXP_SYARIAH
                )
        );
    } 
    
    public function online() {
        $this->template('transaksi_online');
    }

}

?>