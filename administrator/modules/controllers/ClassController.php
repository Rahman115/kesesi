<?php

use \modules\controllers\MainController;

class ClassController extends MainController {

    public function index() {
        
        $this->model('class');
        
        $data = $this->class->get();
        
        $this->template('class', array('class'=>$data));
    }

}

?>