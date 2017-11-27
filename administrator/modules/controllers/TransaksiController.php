<?php

use \modules\controllers\MainController;

class TransaksiController extends MainController {

    public function index() {
        
        
        
        $this->model('transaksi');
        $this->model('studends');
        

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $code = $_POST['kelas'] . "." . $_POST['jurusan'] . "." . $_POST['ruang'];

            $this->model('rooms');

            $code_rooms = $this->rooms->getWhere(array('room' => $code));

            $code_wali = $code_rooms[0]->room . "." . $code_rooms[0]->teacher_code;
            
//            $data = $this->studends->getWhere(array('code_room' => $code_wali));
            
            $data = $this->transaksi->getJoin('studends', array('transaksi.id_student' => 'studends.nis', 'studends.code_room' => "'{$code_wali}'"), 'RIGHT JOIN');

            
        

//            var_dump($code_kelas);
            $this->template('transaksi', array('transaksi' => $data));
        } else {
            
        $data = $this->transaksi->getJoin('studends', array('transaksi.id_student' => 'studends.nis'), 'RIGHT JOIN');
            
        $this->template('transaksi', array('transaksi' => $data));
        
        }
        
        
            

        // var_dump($data);
        // SELECT * FROM `transaksi` RIGHT JOIN `studends` ON transaksi.id_student = studends.nis
    }

}

?>