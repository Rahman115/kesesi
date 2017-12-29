<?php

use \modules\controllers\MainController;

class SettingsController extends MainController {

    public function index() {

        $error = array();
        $success = NULL;

        $this->model('settings');

        $data = $this->settings->getWhere(array('id' => 1));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $spp = isset($_POST['form_set_spp']) ? $_POST['form_set_spp'] : '';
            $praktek = isset($_POST['form_set_praktek']) ? $_POST['form_set_praktek'] : '';
            $syariah = isset($_POST['form_set_syariah']) ? $_POST['form_set_syariah'] : '';

            $arr = array(
                'spp' => $spp,
                'syariah' => $syariah,
                'praktek' => $praktek
            );

            $upd = $this->settings->update($arr, array('id' => 1));

            if ($upd) {
                $success = "Data telah tersimpan";
            }
        }

        $this->template('settings', array('set' => $data[0], 'title' => "PENGATURAN", 'error' => $error, 'success' => $success));
    }

}

?>