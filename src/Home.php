<?php
class Home {
    private $action;
    
    public function __construct() {
        $this->action = $_GET['action'];
    }
    
    public function run() {
        return $this->render();
    }
    
    private function render() {
        return "Home / $this->action";
    }
}
