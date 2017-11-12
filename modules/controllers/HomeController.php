<?php

use \modules\controllers\MainController;

class HomeController extends MainController {
    public function index(){
        $this->model('artikel'); // memanggil model artikel
        
        // mendapatkan data pada model artikel
        $data = $this->artikel->get(array('limit' => '0,5')); 
        
        // view home yang sudah dimasukkan ke dalam template
        $this->template('home', array('artikel' => $data));
    }
}
?>