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
    
    public function insert(){
        $error = array();
        $success = NULL;

        $this->model('studends');
        $this->model('teacher');
        
        $guru = $this->teacher->get();
        
        $this->template('studends_form', array('title' => "DATA SISWA BARU", 'error' => $error, 'success' => $success, 'guru' => $guru));
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

    public function kelas() {
        $KELAS = isset($_GET['kelas']) ? $_GET['kelas'] : '';

        $title = "DATA SISWA KELAS " . $KELAS;

        $this->model('studends');
        $this->model('major');

        $studends = $this->studends->getLike(array('code_room' => $KELAS . '.'));
        $major = $this->major->get();

//        var_dump($major);

        $this->template('studends_kelas', array('title' => $title, 'kelas' => $KELAS, 'studends' => $studends, 'major' => $major));
    }

    public function major() {

        $major = isset($_GET['major']) ? $_GET['major'] : '';

        $title = "DATA SISWA KELAS " . $major;

        $this->model('studends');
        $this->model('major');

        $explode_room_select = explode('.', $major);

        if (count($explode_room_select) == 3) {
            $select = $explode_room_select[2];
//            $major = $major .".".$select;
        } else {
            $select = 1;
            $major = $major . "." . $select;
        }

//        echo $select;

        $majorLike = $explode_room_select[0] . "." . $explode_room_select[1];

        $studends_major = $this->studends->getLike(array('code_room' => $major . '.'));
        $studends = $this->studends->getLike(array('code_room' => $majorLike . '.'));
        $mjr = $this->major->get();

        foreach ($studends AS $value) {
            $exp = explode('.', $value->code_room);
            $r[$exp[2]] = $exp[2];
//            echo $value->code_room;
        }

//        var_dump($studends);
//        var_dump($major);

        $this->template('studends_major', array('title' => $title, 'major' => $majorLike, 'studends' => $studends, 'studends_major' => $studends_major, 'ruang' => $r, 'mjr' => $mjr, 'roomSelected' => $select));
    }

    public function upgrade() {

        $kelas = isset($_GET['kelas']) ? $_GET['kelas'] : '';

        $this->model('studends');
        $this->model('teacher');

        $data = $this->studends->getLike(array('code_room' => $kelas . "."));
        $explode = explode('.', $data[0]->code_room);
        $guruWhere = $this->teacher->getWhere(array('nip' => $explode[3]));
        $guru = $this->teacher->get();


        $upKelas = $this->selectKelas($explode[0]);
        
        $arrKelas = array(
            'downKelas' => $explode[0],
            'upKelas' => $upKelas,
            'defaultKelas' => $explode[1] . '.' . $explode[2]
        );
//        var_dump($kel);

        $this->formPostNaikKelas();

//        var_dump($guruWhere);
        $this->template('studends_upgrade', array(
            'siswa' => $data,
            'guru' => $guru,
            'title' => "Kenaikan Kelas",
            'guruWhere' => $guruWhere[0],
            'arrKelas' => $arrKelas
        ));
    }

    private function selectKelas($params) {
        $arrKelas = array(
            'X' => 10,
            'XI' => 11,
            'XII' => 12,
            'LULUS' => 13
        );

        $val = $arrKelas[$params] + 1;

        foreach ($arrKelas AS $key => $value) {
            if ($value == $val) {
                return $key;
            }
        }
    }

    private function formPostNaikKelas() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $siswa_f = isset($_POST['formSiswaCheck']) ? $_POST['formSiswaCheck'] : '';
            $guru_f = isset($_POST['formWaliKelas']) ? $_POST['formWaliKelas'] : '';
            $kelas_f = isset($_POST['form_kelas_baru']) ? $_POST['form_kelas_baru'] : '';
            $major_f = isset($_POST['form_major_baru']) ? $_POST['form_major_baru'] : '';

            $code_room_new = $kelas_f.'.'.$major_f.'.'.$guru_f;
            
//            var_dump($code_room_new);
            foreach ($siswa_f AS $nis){
                $arr = array('code_room' => $code_room_new);
                $this->studends->update($arr, array('nis' => $nis));
            }
            
//            for($i=0; $i<count($arr); $i++){
//                
//                
//            }
            $this->redirect(SITE_URL."?page=studends&action=major&major=".$kelas_f.'.'.$major_f);
        }
    }

}

?>