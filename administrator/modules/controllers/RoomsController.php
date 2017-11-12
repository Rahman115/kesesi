<?php

use \modules\controllers\MainController;

class RoomsController extends MainController {

    public function index() {
        $this->model('rooms');

        $data = $this->rooms->get();

        $this->template('rooms', array('rooms' => $data));
    }

}

?>