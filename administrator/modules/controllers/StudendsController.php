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

        $data = $this->studends->getWhere(array('id_studend' => $ID));

        $this->template('studends_info', array('studends' => $data[0]));
    }

    public function update() {
        $error = array();
        $success = NULL;

        $this->model('studends');
        $this->model('teacher');

        $ID = isset($_GET['id']) ? $_GET['id'] : '';

        $data = $this->studends->getWhere(array('id_studend' => $ID));
        $guru = $this->teacher->get();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_studends = isset($_POST['form_siswa_id_studends']) ? $_POST['form_siswa_id_studends'] : '';
            $nis = isset($_POST['form_siswa_nis']) ? $_POST['form_siswa_nis'] : '';
            $name = isset($_POST['form_siswa_name']) ? $_POST['form_siswa_name'] : '';
            $gendre = isset($_POST['form_siswa_gendre']) ? $_POST['form_siswa_gendre'] : '';
            $code = isset($_POST['form_siswa_code_room']) ? $_POST['form_siswa_code_room'] : '';
            $status = isset($_POST['form_siswa_status']) ? $_POST['form_siswa_status'] : '';

            $code = $code[0] . "." . $code[1] . "." . $code[2] . "." . $code[3];

            $arr = array(
                'nis' => $nis,
                'code_room' => $code,
                'name' => $name,
                'gendre' => $gendre,
                'status' => $status
            );
            $upd = $this->studends->update($arr, array('id_studend' => $ID));
            if ($upd) {
                $success = "Data telah tersimpan";
            }
        }

        $this->template('studends_form', array('studends' => $data[0], 'title' => "UBAH DATA SISWA", 'error' => $error, 'success' => $success, 'guru' => $guru));
    }

}

?>