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
    
    public function pembayaran(){
        
        $this->model('studends');
        
        $ID = isset($_GET['ID']) ? $_GET['ID'] : '';
        
        $data = $this->studends->getWhere(array('nis'=>$ID));
        
        $this->template('transaksi_pembayaran', array('siswa' => $data[0]));
    }

}

?>