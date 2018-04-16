<?php
class BaseClass {
    public $action;
    public $template;
    public $className;
    public $model;
    
    public function __construct() {
        // Set up simple metadata for the class. Any logic should be moved to BaseClass::run.
        $this->className = get_class($this);
        $this->action    = $_GET['action'];
        $this->template  = $this->action;
        $this->run();
    }
    
    public function run() {
        // Load model if it exists.
        //if (file_exists("models/$this->className.php")) {
            //include("models/$this->className.php");
        //}
        
        //return $this->template;
    }
}
