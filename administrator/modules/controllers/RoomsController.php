<?php

use \modules\controllers\MainController;

class RoomsController extends MainController {

    public function index() {
        $this->model('rooms');

        $data = $this->rooms->getJoin('teacher', array('rooms.teacher_code' => 'teacher.nip'), 'JOIN');

        $this->template('rooms', array('rooms' => $data));
    }

}

?>