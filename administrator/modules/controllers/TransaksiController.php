<?php

use \modules\controllers\MainController;

class TransaksiController extends MainController {
    
    public function index(){
        $this->model('transaksi');
        $this->model('studends');
        
        $data = $this->transaksi->getJoin('studends', array('transaksi.id_student' => 'studends.nis'), 'RIGHT JOIN');
        // var_dump($data);
        // SELECT * FROM `transaksi` RIGHT JOIN `studends` ON transaksi.id_student = studends.nis
        $this->template('transaksi', array('transaksi' => $data));
    }
    
}

?>