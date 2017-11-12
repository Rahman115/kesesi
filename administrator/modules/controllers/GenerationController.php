<?php

use \modules\controllers\MainController;

class GenerationController extends MainController {

    public function index() {
        
        $this->model('generation');
        
        $data = $this->generation->get();
        
        $this->template('generation', array('generation'=>$data));
        
    }

    public function delete() {
        
        $id = isset($_GET["id"]) ? $_GET["id"] : '0';
        
        $this->model('generation');
        
        $delete  = $this->generation->delete(array('id' => $id));
        
        if($delete) {
            $this->back();
        }
    }

    public function insert() {
        
        $this->model('generation');
        
        $error = array();
        $success = null;
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name   = isset($_POST["name"])     ? $_POST["name"]    : "";
            $arti   = isset($_POST["arti"])     ? $_POST["arti"]    : "";
            $resume = isset($_POST["resume"])   ? $_POST["resume"]  : "";
            $year   = isset($_POST["year"])     ? $_POST["year"]    : "";
            $total  = isset($_POST["total"])    ? $_POST["total"]   : "";
            
            if(empty($name) || $name == "") {
                array_push($error, "Nama tidak boleh kosong");
            }
            if(empty($arti) || $arti == "") {
                array_push($error, "Arti tidak boleh kosong");
            }
            if(empty($resume) || $resume == "") {
                array_push($error, "Singkatan tidak boleh kosong");
            }
            if(empty($year) || $year == "") {
                array_push($error, "Tahun tidak boleh kosong");
            }
            if(empty($total) || $total == "") {
                array_push($error, "Total tidak boleh kosong");
            }
            
            if(count($error) == 0) {
                $insert = $this->generation->insert(
                    array(
                        'name'      => $name,
                        'arti'      => $arti,
                        'resume'    => $resume,
                        'year'      => $year,
                        'total'     => $total
                    )
                );
                
                if($insert) {
                    $success = "Data berhasil disimpan";
                }
            } // end if
        } // end if
            $this->template('frmGeneration', array('error' => $error, 'success' => $success, 'title' => "Tambah Angkatan"));
    } // end function insert

    public function update() {
        
        $id = isset($_GET["id"]) ? $_GET["id"] : '0';
        
        $this->model('generation');
        
        $data = $this->generation->getWhere(array('id' => $id));
        
        $error = array();
        $success = null;
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name   = isset($_POST["name"])     ? $_POST["name"]    : "";
            $arti   = isset($_POST["arti"])     ? $_POST["arti"]    : "";
            $resume = isset($_POST["resume"])   ? $_POST["resume"]  : "";
            $year   = isset($_POST["year"])     ? $_POST["year"]    : "";
            $total  = isset($_POST["total"])    ? $_POST["total"]   : "";
            
            if(empty($name) || $name == "") {
                array_push($error, "Nama tidak boleh kosong");
            }
            if(empty($arti) || $arti == "") {
                array_push($error, "Arti tidak boleh kosong");
            }
            if(empty($resume) || $resume == "") {
                array_push($error, "Singkatan tidak boleh kosong");
            }
            if(empty($year) || $year == "") {
                array_push($error, "Tahun tidak boleh kosong");
            }
            if(empty($total) || $total == "") {
                array_push($error, "Total tidak boleh kosong");
            }
            
            if(count($error) == 0) {
                $getUpdate = array(
                            'name'      => $name,
                            'arti'      => $arti,
                            'resume'    => $resume,
                            'year'      => $year,
                            'total'     => $total
                    );
                
                
                $update = $this->generation->update($getUpdate, array('id' => $id));
                
                if($update) {
                    $success = "Data berhasil disimpan";
                }
            } // end if
        } // end if
            $this->template('frmGeneration', array('generation' => $data[0],'error' => $error, 'success' => $success, 'title' => "Update Angkatan"));
    } // end func. update

}

?>