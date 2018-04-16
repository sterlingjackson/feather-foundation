<?php
class Home extends BaseClass {
    public function __construct() {
        parent::__construct(); // This allows us to inherit the parent constructor instead of override it.
        
        // Populate data model based on route/action.
        switch($this->action) {
            case "default":
                $this->model  = [
                    'title' => $this->className
                ];
                break;
            case "someaction":
                $this->model  = [
                    'title' => $this->className
                ];
                break;
        }
    }
}
