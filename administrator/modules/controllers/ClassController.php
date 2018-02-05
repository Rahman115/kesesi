<?php

use \modules\controllers\MainController;

class ClassController extends MainController {

    public function index() {
        
        $this->model('class');
        
        $kelas = isset($_GET['kelas']) ? $_GET['kelas'] : 'X';
        
        $data = $this->class->getLike(array('class' => $kelas.'.'));
        
        $this->template('class', array('class'=>$data));
    }

}

?>