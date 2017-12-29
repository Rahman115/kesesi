<?php

use \modules\controllers\MainController;

class TeacherController extends MainController {

    public function index() {

        $this->model('teacher');

        $data = $this->teacher->get();

        $this->template('teacher', array('teacher' => $data));
    }

    public function detail() {
        $this->model('teacher');

        $ID = isset($_GET['id']) ? $_GET['id'] : '';

        $data = $this->teacher->getWhere(array('id_teacher' => $ID));

        $this->template('teacher_detail', array('teacher' => $data[0]));
    }

    public function update() {
        $error = array();
        $success = NULL;

        $this->model('teacher');

        $ID = isset($_GET['id']) ? $_GET['id'] : '';

        $data = $this->teacher->getWhere(array('id_teacher' => $ID));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_teacher = isset($_POST['form_guru_id_teacher']) ? $_POST['form_guru_id_teacher'] : '';
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
            $upd = $this->teacher->update($arr, array('id_teacher' => $ID));
            if ($upd) {
                $success = "Data telah tersimpan";
            }
            
        }

        $this->template('teacher_form', array('teacher' => $data[0], 'title' => "UBAH DATA GURU", 'error' => $error, 'success' => $success));
    }

}

?>