<?php

use \modules\controllers\MainController;

class HomeController extends MainController {

    public function index() {

        $data = $_SESSION["login"];
        $this->model('rooms');
        $this->model('transaksi');
        $this->model('teacher');
        $this->model('studends');
		
		$myDataKelas = $this->dtKelas();
		// var_dump ($myDataKelas);

        $this->template('home', array(
            'userData' => $data,
			'kelasData' => $myDataKelas,
            'total' => array(
                'rooms' => $this->rooms->rows(),
                'transaksi' => $this->transaksi->rows(),
                'teacher' => $this->teacher->rows(),
                'studends' => $this->studends->rows()
            )
        ));

		
		
    }
	
	private function dtKelas(){
		$qry_x = "SELECT SUM(transaksi.price) AS JUMLAH FROM transaksi JOIN studends ON transaksi.id_student = studends.nis WHERE studends.code_room LIKE '%X.%' AND transaksi.date_transaksi LIKE '2018-01-%'";
		
		$qry_xi = "SELECT SUM(transaksi.price) AS JUMLAH FROM transaksi JOIN studends ON transaksi.id_student = studends.nis WHERE studends.code_room LIKE '%XI.%' AND transaksi.date_transaksi LIKE '2018-01-%'";
		
		$qry_xii = "SELECT SUM(transaksi.price) AS JUMLAH FROM transaksi JOIN studends ON transaksi.id_student = studends.nis WHERE studends.code_room LIKE '%XII.%' AND transaksi.date_transaksi LIKE '2018-01-%'";
		
		
		$dataKelas[0] = $this->transaksi->query($qry_x);
		$dataKelas[1] = $this->transaksi->query($qry_xi);
		$dataKelas[2] = $this->transaksi->query($qry_xii);
		
		return $dataKelas;
	}
    
    public function kelas(){
        $data = $_SESSION["login"];
        $this->model('rooms');
        $this->model('transaksi');
        $this->model('teacher');
        $this->model('studends');
        
        $dataTraJariah = $this->transaksi->getWhere(array('status_transaksi' => 'JARIAH'));
        $dataTraSpp = $this->transaksi->getWhere(array('status_transaksi' => 'SPP'));
        $dataTraPraktek = $this->transaksi->getWhere(array('status_transaksi' => 'PRAKTEK'));
		
		// var_dump ($dataTraPraktek);
		

		
        $this->template('home', array(
            'userData' => $data,
            'total' => array(
                'rooms' => $this->rooms->rows(),
                'transaksi' => $this->transaksi->rows(),
                'teacher' => $this->teacher->rows(),
                'studends' => $this->studends->rows()
            )
        ));
		
    }

}

?>