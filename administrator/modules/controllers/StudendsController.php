<?php

use \modules\controllers\MainController;

class StudendsController extends MainController {

    public function index() {
        
        $this->model('studends');
        
        $data = $this->studends->get();

        $this->template('studends', array('studends' => $data));
    }
    
    
    public function detail() {
        $this->model('studends');

        $ID = isset($_GET['id']) ? $_GET['id'] : '';

        $data = $this->studends->getWhere(array('id_studends' => $ID));

        $this->template('studends_detail', array('studends' => $data[0]));
    }

    public function update() {
        $error = array();
        $success = NULL;

        $this->model('studends');

        $ID = isset($_GET['id']) ? $_GET['id'] : '';

        $data = $this->studends->getWhere(array('id_studends' => $ID));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_studends = isset($_POST['form_guru_id_studends']) ? $_POST['form_guru_id_studends'] : '';
            $nip = isset($_POST['form_guru_nip']) ? $_POST['form_guru_nip'] : '';
            $nuptk = isset($_POST['form_guru_nuptk']) ? $_POST['form_guru_nuptk'] : '';
            $name = isset($_POST['form_guru_name']) ? $_POST['form_guru_name'] : '';
            $gender = isset($_POST['form_guru_gender']) ? $_POST['form_guru_gender'] : '';
            $status_code = isset($_POST['form_guru_status_code']) ? $_POST['form_guru_status_code'] : '';
            $graduate_date = isset($_POST['form_guru_graduate_date']) ? $_POST['form_guru_graduate_date'] : '';
            $graduate = isset($_POST['form_guru_graduate']) ? $_POST['form_guru_graduate'] : '';
            $position = isset($_POST['form_guru_position']) ? $_POST['form_guru_position'] : '';
            $place_of_birth = isset($_POST['form_guru_place_of_birth']) ? $_POST['form_guru_place_of_birth'] : '';
            $date_of_birth = isset($_POST['form_guru_date_of_birth']) ? $_POST['form_guru_date_of_birth'] : '';
            $address = isset($_POST['form_guru_address']) ? $_POST['form_guru_address'] : '';
            $status = isset($_POST['form_guru_status']) ? $_POST['form_guru_status'] : '';

            $arr = array(
                'nip' => $nip,
                'nuptk' => $nuptk,
                'name' => $name,
                'gender' => $gender,
                'status_code' => $status_code,
                'graduate_date' => $graduate_date,
                'graduate' => $graduate,
                'position' => $position,
                'place_of_birth' => $place_of_birth,
                'date_of_birth' => $date_of_birth,
                'address' => $address,
                'status' => $status
            );
            $upd = $this->studends->update($arr, array('id_studends' => $ID));
            if ($upd) {
                $success = "Data telah tersimpan";
            }
            
        }

        $this->template('studends_form', array('studends' => $data[0], 'title' => "UBAH DATA GURU", 'error' => $error, 'success' => $success));
    }


}

?>