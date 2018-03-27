<?php
class Application extends Foundation {
    public $output;
    public $routes;
    public $config;
    
    public function route(string $uri) {
        $this->routes = $this->config['routes'];
        $parsed = parse_url($uri);
        $route = explode("/", $parsed['path'])[1] ?: $this->config['defaultroute'];
        if (array_key_exists($route, $this->routes)) {
            $route = $this->routes[$route];
            include("src/$route.php");
            $module = new $route();
            $this->output = $module->run();
        }
        else {
            echo "The route ($route) is invalid.";
        }
    }
    
    public function render() {
        echo $this->output;
    }
}

