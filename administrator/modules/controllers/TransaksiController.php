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
        $this->model('transaksi');

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
                $data_new[$i][0] = $data[$i];

                $data_new[$i][1] = $this->transaksi->query("SELECT SUM(transaksi.price) AS PRICE FROM transaksi "
                        . "JOIN studends ON transaksi.id_student = studends.nis "
                        . "WHERE transaksi.status_transaksi = 'SYARIAH' "
                        . "AND transaksi.id_student = '{$data[$i]->nis}'");

                $data_new[$i][2] = $this->transaksi->query("SELECT transaksi.date_transaksi AS tgl, transaksi.price AS nominal "
                        . "FROM transaksi "
                        . "JOIN studends ON transaksi.id_student = studends.nis "
                        . "WHERE transaksi.status_transaksi = 'SPP' "
                        . "AND transaksi.id_student = '{$data[$i]->nis}'");
                $data_new[$i][3] = $this->transaksi->query("SELECT SUM(transaksi.price) AS PRICE FROM transaksi "
                        . "RIGHT JOIN studends ON transaksi.id_student = studends.nis "
                        . "WHERE transaksi.status_transaksi = 'PRAKTEK' "
                        . "AND transaksi.jenis_transaksi = 'SEMESTER_GANJIL' "
                        . "AND transaksi.id_student = '{$data[$i]->nis}'");

                $data_new[$i][4] = $this->transaksi->query("SELECT SUM(transaksi.price) AS PRICE FROM transaksi "
                        . "RIGHT JOIN studends ON transaksi.id_student = studends.nis "
                        . "WHERE transaksi.status_transaksi = 'PRAKTEK' "
                        . "AND transaksi.jenis_transaksi = 'SEMESTER_GENAP' "
                        . "AND transaksi.id_student = '{$data[$i]->nis}'");
            }
        }


        $this->template('transaksi_rooms', array('activ' => $data_new, 'rm' => $data_rooms_new));
    }

    public function pembayaran() {

        $this->model('studends');
        $this->model('transaksi');
        $this->model('settings');

        $error = array();
        $success = NULL;
        $myId = NULL;
        $pembayaran = NULL;

        $pembayaran = isset($_GET['pembayaran']) ? $_GET['pembayaran'] : '';
        $ID = isset($_GET['ID']) ? $_GET['ID'] : '';


        $set = $this->settings->getWhere(array('id' => 1));
        $set = $set[0];

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

            if ($post[1] == 'SPP') {

                $qry = "SELECT transaksi.exp AS exp, transaksi.price AS nominal "
                        . "FROM transaksi "
                        . "JOIN studends ON transaksi.id_student = studends.nis "
                        . "WHERE transaksi.status_transaksi = 'SPP' "
                        . "AND transaksi.id_student = '{$post[0]}' ORDER BY transaksi.exp DESC";



                $data_spp = $this->transaksi->query($qry);


                if ($data_spp != null && $data_spp[0]->exp == 'LUNAS') {
                    array_push($error, "Data pembayaran bulan ini telah LUNAS");
                } else {


                    if ($data_spp != null && $set->spp > $post[2]) {
                        $total = $data_spp[0]->nominal + $post[2];
                        if ($set->spp > $total) {
                            $post[3] = "BELUM LUNAS";
                        } else {

                            $post[3] = "LUNAS";
                        }
                    } else if ($data_spp == NULL && $post[2] == $set->spp) {
                        $post[3] = "LUNAS";
                    } else if ($data_spp == NULL && $post[2] < $set->spp) {
                        $post[3] = "BELUM LUNAS";
                    } else if ($data_spp != NULL && $set->spp < $data_spp[0]->nominal) {
                        array_push($error, "Nominal yang anda inputkan terlalu besar !");
                    }
                }
                // if ($PEMBAYARAN_SYARIAH[0]->PRICE == NULL && $post[2] < $set->syariah) {
                //     $post[3] = 'BELUM_LUNAS';
                // } else if ($PEMBAYARAN_SYARIAH[0]->PRICE != NULL) {
                //     $syariah = $PEMBAYARAN_SYARIAH[0]->PRICE + $post[2];
                //     if ($syariah < $set->syariah) {
                //         $post[3] = 'BELUM_LUNAS';
                //     } else if ($syariah == $set->syariah) {
                //         $post[3] = 'LUNAS';
                //     } else if ($syariah > $set->syariah) {
                //         array_push($error, "Data Harga yang di inputkan lebih");
                //     }
                // }
// array(1) { [0]=> object(stdClass)#30 (2) { ["tgl"]=> string(10) "2018-01-08" ["nominal"]=> string(5) "50000" } }
            }

            if ($post[1] == 'SYARIAH') {
                if ($PEMBAYARAN_SYARIAH[0]->PRICE == NULL && $post[2] < $set->syariah) {
                    $post[3] = 'BELUM_LUNAS';
                } else if ($PEMBAYARAN_SYARIAH[0]->PRICE != NULL) {
                    $syariah = $PEMBAYARAN_SYARIAH[0]->PRICE + $post[2];
                    if ($syariah < $set->syariah) {
                        $post[3] = 'BELUM_LUNAS';
                    } else if ($syariah == $set->syariah) {
                        $post[3] = 'LUNAS';
                    } else if ($syariah > $set->syariah) {
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
                if ($examp[0]->PRICE == NULL && $post[2] < $set->praktek) {
                    $post[3] = 'BELUM_LUNAS';
                } else if ($examp[0]->PRICE == NULL && $post[2] == $set->praktek) {
                    $post[3] = 'LUNAS';
                } else if ($examp[0]->PRICE == NULL && $post[2] > $set->praktek) {
                    array_push($error, "Data Harga yang di inputkan lebih");
                } else if ($examp[0]->PRICE != NULL) {
                    $total = $examp[0]->PRICE + $post[2];
                    if ($total < $set->praktek) {
                        $post[3] = 'BELUM_LUNAS';
                    } else if ($total == $set->praktek) {
                        $post[3] = 'LUNAS';
                    } else if ($total > $set->praktek) {
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

        $info = FALSE;
        $success = NULL;
        $data_info = NULL;
        $error = array();

        $this->model('transaksi');
        $this->model('settings');

        $set = $this->settings->getWhere(array('id' => 1));
        $set = $set[0];

        $ID = isset($_GET['ID']) ? $_GET['ID'] : '';



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nis = isset($_POST['transfer_nis_pengguna']) ? $_POST['transfer_nis_pengguna'] : '';
            $status = isset($_POST['transfer_status']) ? $_POST['transfer_status'] : '';
            $type = isset($_POST['transfer_bank']) ? $_POST['transfer_bank'] : '';
            $name = isset($_POST['transfer_nama_pengguna']) ? $_POST['transfer_nama_pengguna'] : '';
            $rek = isset($_POST['transfer_nomor_rekening_pengguna']) ? $_POST['transfer_nomor_rekening_pengguna'] : '';
            $nominal = isset($_POST['transfer_nominal_pengguna']) ? $_POST['transfer_nominal_pengguna'] : '';
            $foto = isset($_POST['transfer_bukti_pembayaran']) ? $_POST['transfer_bukti_pembayaran'] : '';
            $date = isset($_POST['transfer_date']) ? $_POST['transfer_date'] : '';

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

                if ($status == 'SPP') {
                    $PEMBAYARAN_SPP = $this->transaksi->query("SELECT transaksi.date_transaksi AS waktu, price FROM transaksi "
                            . "RIGHT JOIN studends ON transaksi.id_student = studends.nis "
                            . "WHERE (transaksi.jenis_transaksi = 'BULANAN' OR transaksi.jenis_transaksi = 'BULANAN_OL') AND transaksi.id_student = '{$nis}'");
                    if (empty($PEMBAYARAN_SPP)) {
//                                    echo "Hello";
                        if ($set->spp > $nominal) {
                            $exp = "BELUM_LUNAS";
                        } else {
                            $exp = "LUNAS";
                        }
                    } else {
                        foreach ($PEMBAYARAN_SPP AS $val) {
                            if ($val->waktu == $date) {
                                if ($val->price < $set->spp) {
                                    $nominal = $val->price + $nominal;
                                    if ($nominal < $set->spp) {
                                        $exp = "BELUM_LUNAS";
                                    } else {
                                        $exp = "LUNAS";
                                    }
                                } else {
                                    array_push($error, 'Terdapat pembayaran ditanggal yang sama');
                                }
                            } else {
                                if ($nominal < $set->spp) {
                                    $exp = "BELUM_LUNAS";
                                } else {
                                    $exp = "LUNAS";
                                }
                            }
                        }
                    }
                    $jenis = 'BULANAN_OL';
                } else if ($status == 'PRAKTEK-GANJIL' || $status == 'PRAKTEK-GENAP') {

                    $exStatus = explode('-', $status);

                    $jenis = "PRAKTEK_" . $exStatus[1];

                    $PEMBAYARAN_PRAKTEK = $this->transaksi->query("SELECT SUM(transaksi.price) AS PRICE FROM transaksi "
                            . "RIGHT JOIN studends ON transaksi.id_student = studends.nis "
                            . "WHERE transaksi.jenis_transaksi= '{$jenis}' "
                            . "AND transaksi.status_transaksi = '{$status}' "
                            . "AND transaksi.id_student = '{$nis}'");
                            
                    $status = $exStatus[0];
                    
                    if ($PEMBAYARAN_PRAKTEK[0]->PRICE != NULL) {
                        $nominal = $PEMBAYARAN_PRAKTEK[0]->PRICE + $nominal;
                        if ($nominal < $set->praktek) {
                            $exp = 'BELUM_LUNAS';
                        } else {
                            $exp = 'LUNAS';
                        }
                    } else {
                        if ($nominal < $set->praktek) {
                            $exp = 'BELUM_LUNAS';
                        } else {
                            $exp = 'LUNAS';
                        }
                    }
                } else if ($status == 'SYARIAH') {
                    $PEMBAYARAN_SYARIAH = $this->transaksi->query("SELECT SUM(transaksi.price) AS PRICE FROM transaksi "
                            . "RIGHT JOIN studends ON transaksi.id_student = studends.nis "
                            . "WHERE transaksi.status_transaksi = 'SYARIAH' AND transaksi.jenis_transaksi = 'SYARIAH_OL' AND transaksi.id_student = '{$nis}'");
//                    var_dump($PEMBAYARAN_SYARIAH);
                    $jenis = 'SYARIAH_OL';

                    if ($PEMBAYARAN_SYARIAH[0]->PRICE != NULL) {
                        $nominal = $PEMBAYARAN_SYARIAH[0]->PRICE + $nominal;
                        if ($nominal < $set->syariah) {
                            $exp = 'BELUM_LUNAS';
                        } else {
                            $exp = 'LUNAS';
                        }
                    } else {
                        if ($set->syariah > $nominal) {
                            $exp = 'BELUM_LUNAS';
                        } else {
                            $exp = 'LUNAS';
                        }
                    }
                }

                $arr = array(
//                    'id_transaksi' => '',
                    'id_student' => $nis,
                    'date_transaksi' => date('Y-m-d'),
                    'status_transaksi' => $status,
                    'jenis_transaksi' => $jenis,
                    'price' => $nominal,
                    'exp' => $exp . "-" . $type . "/" . $rek . "/" . $name . "/" . $foto
                );

//                var_dump($arr);
                $upd = $this->transaksi->update($arr, array('id_transaksi' => $ID));
                if ($upd) {
                    $success = "BERHASIL MELAKUKAN TRANSAKSI";
                    $this->redirect(SITE_URL . "?page=transaksi&action=online");
                }
            }
        }

        if (!empty($ID) || $ID != '') {

            $data_info = $this->transaksi->getJoin('studends', array('transaksi.id_student' => 'studends.nis', 'transaksi.id_transaksi' => $ID), "JOIN");

            $sum_info = $this->transaksi->rows();
            if ($sum_info > 0) {

                $info = TRUE;
            }
        }


        $data = $this->transaksi->getJoin('studends', array('transaksi.id_student' => 'studends.nis', 'transaksi.jenis_transaksi' => "'ONLINE_CONFIRM'"), "JOIN");

        $this->template('transaksi_online', array('online' => $data, 'info' => $info, 'dataInfo' => $data_info[0], 'error' => $error, 'success' => $success));
    }

}

?>