<?php

class Controller{
    protected function view($viewName){
        $view = new View($viewName);
        return $view;
    }
	
	protected function fpdf(){
		$pdf = new FPDF();
		return $pdf;
	}

    protected function model($modelName){
        require_once ROOT . DS . 'modules' . DS . 'models' . DS . $modelName . 'Model.php';
        $className = ucfirst($modelName). 'Model';
        $this->$modelName = new $className();
    }

    protected function template($viewName, $data = array()){
        $view = $this->view('template');
        $view->bind('viewName', $viewName);
        $view->bind('data', $data);
    }
	
	protected function templatePdf($viewName, $data = array()) {
		$view = $this->view('templatePdf');
		$view->bind('viewName', $viewName);
		$view->bind('data', $data);
	}
    
    public function back() {

        echo '<script>history.go(-1);</script>';
    }

    public function redirect($url = "") {

        header("location:" . $url);
    }

    protected function validate($data) {

        return htmlentities(trim(strip_tags($data)));
    }
}
?>