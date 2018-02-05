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
            $bank[0] = isset($_POST['form_bank_name']) ? $_POST['form_bank_name'] : '';
            $bank[1] = isset($_POST['form_no_rek']) ? $_POST['form_no_rek'] : '';
            $bank[2] = isset($_POST['form_atas_nama']) ? $_POST['form_atas_nama'] : '';

            $saved = "";
            $n = 0;

            for ($i = 0; $i < count($bank); $i++) {
                if ($bank[$i][count($bank[$i]) - 1] == '' || empty($bank[$i][count($bank[$i]) - 1])) {
                    $n += 1;
                    $bank[$i][count($bank[$i]) - 1] = '-';
                } else {
                    $n += 0;
                }
            }

            if ($n == 3) {
                $n = 1;
            } else {
                $n = 0;
            }

            for ($j = 0; $j < count($bank[0]) - $n; $j++) {

                for ($i = 0; $i < count($bank); $i++) {
                    if ($bank[$i][$j] == '' || empty($bank[$i][$j])) {
                        
                    } else {

                        $saved .= $bank[$i][$j];
//                    $saved .= $bank[$j][$i];
                        if ($i < count($bank) - 1) {
                            $saved .= '/';
                        }
                    } // end for if empty
                } // end for $i

                if ($bank[0][$j] == '' || empty($bank[0][$j]) && $bank[1][$j] == '' || empty($bank[1][$j]) && $bank[2][$j] == '' || empty($bank[2][$j])) {
                    $saved .= '';
                } else {

                    if ($j < count($bank[0]) - (1 + $n)) {
                        $saved .= ';';
                    }
                }
            }
//            $saved
            if ($saved[strlen($saved) - 1] == ';') {
                $hasilExplodeSaved = explode(';', $saved);
                if (empty($hasilExplodeSaved[count($hasilExplodeSaved) - 1]) || $hasilExplodeSaved[count($hasilExplodeSaved) - 1] == '') {
                    $saved_new = '';
                    for ($x = 0; $x < count($hasilExplodeSaved) - 1; $x++) {
                        $saved_new .= $hasilExplodeSaved[$x];

                        if ($x < (count($hasilExplodeSaved) - 2)) {
                            $saved_new .= ';';
                        }
                    }
                    $saved = $saved_new;
                }
            }

            $arr = array(
                'spp' => $spp,
                'syariah' => $syariah,
                'praktek' => $praktek,
                'bank' => $saved
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