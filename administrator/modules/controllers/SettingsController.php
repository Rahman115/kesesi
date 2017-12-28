<?php

use \modules\controllers\MainController;

class SettingsController extends MainController {
    
    public function index() {
        $this->template('settings');
        
    }
}
?>