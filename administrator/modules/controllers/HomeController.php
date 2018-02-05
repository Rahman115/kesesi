<?php

use \modules\controllers\MainController;

class HomeController extends MainController {

    public function index() {

        $data = $_SESSION["login"];
        $this->model('rooms');
        $this->model('transaksi');
        $this->model('teacher');
        $this->model('studends');

        $this->template('home', array(
            'userData' => $data,
            'total' => array(
                'rooms' => $this->rooms->rows(),
                'transaksi' => $this->transaksi->rows(),
                'teacher' => $this->teacher->rows(),
                'studends' => $this->studends->rows()
            )
        ));
    }
    
    public function kelas(){
        $data = $_SESSION["login"];
        $this->model('rooms');
        $this->model('transaksi');
        $this->model('teacher');
        $this->model('studends');
        
        $dataTraSyariah = $this->transaksi->getWhere(array('status_transaksi' => 'SYARIAH'));
        $dataTraSpp = $this->transaksi->getWhere(array('status_transaksi' => 'SYARIAH'));
        $dataTraPraktek = $this->transaksi->getWhere(array('status_transaksi' => 'SYARIAH'));

        $this->template('home', array(
            'userData' => $data,
            'total' => array(
                'rooms' => $this->rooms->rows(),
                'transaksi' => $this->transaksi->rows(),
                'teacher' => $this->teacher->rows(),
                'studends' => $this->studends->rows()
            )
        ));
    }

}

?>