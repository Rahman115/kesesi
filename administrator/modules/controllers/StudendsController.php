<?php

use \modules\controllers\MainController;

class StudendsController extends MainController {

    public function index() {
        
        $this->model('studends');
        
        $data = $this->studends->get();

        $this->template('studends', array('studends' => $data));
    }

}

?>