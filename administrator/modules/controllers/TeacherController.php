<?php

use \modules\controllers\MainController;

class TeacherController extends MainController {
    
    public function index() {
        
        $this->model('teacher');
        
        $data = $this->teacher->get();
        
        $this->template('teacher', array('teacher'=>$data));
    }
    
    
}


?>