<?php

use \modules\controllers\MainController;

class MajorController extends MainController {

    public function index() {

        $this->model('major');

        $data = $this->major->get();
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kode = isset($_POST['form_kode']) ? $_POST['form_kode'] : '';
            $arti = isset($_POST['form_arti']) ? $_POST['form_arti'] : '';
            
            $arr = array('id_major'=>'', 'code' => $kode, 'stands' => $arti);
            // `id_major`, `code`, `stands`
            
            $this->major->insert($arr);
            
            $this->back();
        }

        $this->template('major', array('major' => $data, 'access' => false));
    }

    public function kelas() {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;

        // SELECT * FROM `major` AS m, class AS c WHERE m.code = c.major_code AND m.code = 'AKT'


        $this->model('major');

        $data = $this->major->get();
        
        $selectMajor = $this->major->getJoin('class', array('class.major_code' => "major.code", 'major.code' => "'{$id}'"), 'JOIN'
        );

		// var_dump($selectMajor);

        $this->template('major', array('major' => $data, 'id' => $id, 'access' => true, 'selectMajor' => $selectMajor));
    }

}

?>