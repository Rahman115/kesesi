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
        $data = $_SESSION["loginStudend"];
        $this->template('transaksi_online', array(
            'studend' => $data)
        );
    }

}

?>