<?php

use \modules\controllers\MainController;

class HomeController extends MainController {

    public function index() {

        $data = $_SESSION["login"];
        		
		/**
		$this->model('bukutamu');
        $this->model('artikel');
        $this->model('guru');
        $this->model('kontak');
        $this->template(
                'home', array('userData' => $data, 'total' => array(
                'bukutamu' => $this->bukutamu->rows(),
                'artikel' => $this->artikel->rows(),
                'guru' => $this->guru->rows(),
                'kontak' => $this->kontak->rows()
            ))
        );
		
		**/
		
		$this->model('rooms');
		$this->model('transaksi');
		$this->model('teacher');
		$this->model('studends');
		
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