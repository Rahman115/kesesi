<?php

use \modules\controllers\MainController;

class AnggotaController extends MainController {

    public function index() {
        
        $this->model('anggota');
        
        $data = $this->anggota->get();
        
        $this->template('anggota', array('anggota' => $data));
        
    }

    public function detail() {
        $id = isset($_GET["id"]) ? $_GET["id"] : '0';
        
        $this->model('anggota');
        
        $data = $this->anggota->getWhere(array('id_anggota' =>$id));
        
        $this->template('detailAnggota', array('anggota' => $data[0]));
    }

    public function delete() {
        $id = isset($_GET["id"]) ? $_GET["id"] : '0';
        
        $this->model('anggota');
        
        $data = $this->anggota->getWhere(array('id_anggota' =>$id));
        
        $delete = $this->anggota->delete(array('id_anggota' =>$id));
        
        if($delete && $data[0]->photo) {
            
            $this->back();
        }
    }

    public function insert() {
        
        $this->model('anggota');
        
        $error = array();
        $success = null;
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $nik        = isset($_POST["no_induk"])     ? $_POST["no_induk"]    : "";
            $nama       = isset($_POST["nama"])         ? $_POST["nama"]        : "";
            $angkatan   = isset($_POST["angkatan"])     ? $_POST["angkatan"]    : "";
            $lahir      = isset($_POST["tgl_lahir"])    ? $_POST["tgl_lahir"]   : "";
            $kelamin    = isset($_POST["kelamin"])      ? $_POST["kelamin"]     : "";
            $darah      = isset($_POST["darah"])        ? $_POST["darah"]       : "";
            $pekerjaan  = isset($_POST["pekerjaan"])    ? $_POST["pekerjaan"]   : "";
            $alamat     = isset($_POST["alamat"])       ? $_POST["alamat"]      : "";
            $hp         = isset($_POST["hp"])           ? $_POST["hp"]          : "";
            $email      = isset($_POST["email"])        ? $_POST["email"]       : "";
            $lapangan   = isset($_POST["lapangan"])     ? $_POST["lapangan"]    : "";
            
            $photo      = isset($_FILES["photo"])       ? $_FILES["photo"]      : "";
            
            if(empty($nik) || $nik == "") {
                array_push($error, "No Anggota harus di isi.");
            }
            
            if(empty($nama) || $nama == "") {
                array_push($error, "Nama harus di isi.");
            }
            
            if(empty($angkatan) || $angkatan == "") {
                array_push($error, "Angkatan harus di isi.");
            }
            
            if(empty($lahir) || $lahir == "") {
                array_push($error, "Tanggal Lahir harus di isi.");
            }
            
            if(empty($kelamin) || $kelamin == "") {
                array_push($error, "Jenis Kelamin harus di isi.");
            }
            
            if(empty($darah) || $darah == "") {
                array_push($error, "Golongan Darah harus di isi.");
            }
            
            if(empty($pekerjaan) || $pekerjaan == "") {
                array_push($error, "Pekerjaan harus di isi.");
            }
            
            if(empty($alamat) || $alamat == "") {
                array_push($error, "Alamat harus di isi.");
            }
            
            if(empty($hp) || $hp == "") {
                array_push($error, "Nomor Telepon harus di isi.");
            }
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($error, "Email harus di isi.");
            }
            
            if(empty($lapangan) || $lapangan == "") {
                array_push($error, "Nama Lapangan harus di isi atau diberi tanda kurang ( - ).");
            }
            
            if(!empty($photo["name"]) && $photo["type"] != 'image/jpg' && $photo["type"] != 'image/jpeg' && $photo["type"] != 'image/png') {
                array_push($error, "Gambar harus type .PNG/.JPG");
            }
            
            if(count($error) == 0){
                
                $imageName = $photo["name"];
                
                if($photo["name"]) {
                    
                    $imageName = date("h_i_s_Y_m_d") . str_replace(" ", "_", $nama) . '.jpg';
                    
                    move_uploaded_file($photo["tmp_name"], '../public/images/anggota/' . $imageName );
                }
                
                $insert = $this->anggota->insert(
                    array(
                        'no_induk'      => $nik,
                        'nama'          => $nama,
                        'angkatan'      => $angkatan,
                        'tgl_lahir'     => $lahir,
                        'kelamin'       => $kelamin,
                        'darah'         => $darah,
                        'pekerjaan'     => $pekerjaan,
                        'alamat'        => $alamat,
                        'hp'            => $hp,
                        'email'         => $email,
                        'lapangan'      => $lapangan,
                        'photo'         => $photo
                    )
                );
                
                if($insert) {
                    $success = "Data berhasil disimpan";
                }
                
            }
            
        }
                
        $this->template('frmAnggota', array('error' => $error, 'success' => $success, 'title' => 'Tambah Anggota'));
        
    }

    public function update() {
        
        $id = isset($_GET["id"]) ? $_GET["id"] : '0';
        
        $this->model('anggota');
        
        $data = $this->anggota->getWhere(array('id_anggota' => $id));
        
        $error = array();
        $success = null;
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $nik        = isset($_POST["no_induk"])     ? $_POST["no_induk"]    : "";
            $nama       = isset($_POST["nama"])         ? $_POST["nama"]        : "";
            $angkatan   = isset($_POST["angkatan"])     ? $_POST["angkatan"]    : "";
            $lahir      = isset($_POST["tgl_lahir"])    ? $_POST["tgl_lahir"]   : "";
            $kelamin    = isset($_POST["kelamin"])      ? $_POST["kelamin"]     : "";
            $darah      = isset($_POST["darah"])        ? $_POST["darah"]       : "";
            $pekerjaan  = isset($_POST["pekerjaan"])    ? $_POST["pekerjaan"]   : "";
            $alamat     = isset($_POST["alamat"])       ? $_POST["alamat"]      : "";
            $hp         = isset($_POST["hp"])           ? $_POST["hp"]          : "";
            $email      = isset($_POST["email"])        ? $_POST["email"]       : "";
            $lapangan   = isset($_POST["lapangan"])     ? $_POST["lapangan"]    : "";
            
            $photo      = isset($_FILES["photo"])       ? $_FILES["photo"]      : "";
            
            if(empty($nik) || $nik == "") {
                array_push($error, "No Anggota harus di isi.");
            }
            
            if(empty($nama) || $nama == "") {
                array_push($error, "Nama harus di isi.");
            }
            
            if(empty($angkatan) || $angkatan == "") {
                array_push($error, "Angkatan harus di isi.");
            }
            
            if(empty($lahir) || $lahir == "") {
                array_push($error, "Tanggal Lahir harus di isi.");
            }
            
            if(empty($kelamin) || $kelamin == "") {
                array_push($error, "Jenis Kelamin harus di isi.");
            }
            
            if(empty($darah) || $darah == "") {
                array_push($error, "Golongan Darah harus di isi.");
            }
            
            if(empty($pekerjaan) || $pekerjaan == "") {
                array_push($error, "Pekerjaan harus di isi.");
            }
            
            if(empty($alamat) || $alamat == "") {
                array_push($error, "Alamat harus di isi.");
            }
            
            if(empty($hp) || $hp == "") {
                array_push($error, "Nomor Telepon harus di isi.");
            }
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($error, "Email harus di isi.");
            }
            
            if(empty($lapangan) || $lapangan == "") {
                array_push($error, "Nama Lapangan harus di isi atau diberi tanda kurang ( - ).");
            }
            
            if(!empty($photo["name"]) && $photo["type"] != 'image/jpg' && $photo["type"] != 'image/jpeg' && $photo["type"] != 'image/png') {
                array_push($error, "Gambar harus type .PNG/.JPG");
            }
            
            if(count($error) == 0){
                
                $imageName = $photo["name"];
                
                $getUpdate = array(
                        'no_induk'      => $nik,
                        'nama'          => $nama,
                        'angkatan'      => $angkatan,
                        'tgl_lahir'     => $lahir,
                        'kelamin'       => $kelamin,
                        'darah'         => $darah,
                        'pekerjaan'     => $pekerjaan,
                        'alamat'        => $alamat,
                        'hp'            => $hp,
                        'email'         => $email,
                        'lapangan'      => $lapangan
                );
                
                if($photo["name"]) {
                    
                    $imageName = date("h_i_s_Y_m_d") . str_replace(" ", "_", $nama) . '.jpg';
                    
                    move_uploaded_file($photo["tmp_name"], '../public/images/anggota/' . $imageName );
                
                    $getUpdate = array(
                            'no_induk'      => $nik,
                            'nama'          => $nama,
                            'angkatan'      => $angkatan,
                            'tgl_lahir'     => $lahir,
                            'kelamin'       => $kelamin,
                            'darah'         => $darah,
                            'pekerjaan'     => $pekerjaan,
                            'alamat'        => $alamat,
                            'hp'            => $hp,
                            'email'         => $email,
                            'lapangan'      => $lapangan,
                            'photo'         => $photo

                    );
                }
                
                $update = $this->anggota->update($getUpdate, array('id_anggota' => $id));
                
                if($update) {
                    $success = "Data berhasil disimpan";
                }
                
            }
            
        }
        
        $this->template('frmAnggota', array('anggota' => $data[0], 'error' => $error, 'success' => $success, 'title' => 'Update Anggota'));
        
    }

}

?>