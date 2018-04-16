<?php
class Application extends Foundation {
    public $output;
    public $template;
    public $routes;
    public $config;
    public $route;
    public $module;
    
    /** ROUTE
      * Processes the requested route and loads the corresponding class from src directory. **/
    public function route(string $uri) {
        $this->routes = $this->config['routes'];
        $parsed = parse_url($uri);
        $request = explode("/", $parsed['path'])[1] ?: $this->config['defaultroute'];

        // Verify that the requested route exists in our config file.
        if (array_key_exists($request, $this->routes)) {
            $this->route = $this->routes[$request];
            include("src/$this->route.php");
            $this->module = new $this->route();
            $this->template = $this->module->template;
        }
        else {
            echo "RoutingError: The route ($route) is invalid. Verify that it has been added in your config file.";
        }
    }
    
    /** RENDER
      * Loads and processes a template to send to the client. **/
    public function render() {
        $template = "templates/$this->route/$this->template.html";
        $datamodel = $this->module->model;
        if (file_exists($template)) {
            $this->template = file_get_contents($template);
            $this->output   = $this->template;

            // Replaces tokens with corresponding variable from current model.
            $this->output = preg_replace_callback('!\{\{(\w+)\}\}!', function($match) use ($datamodel) {
                if (isset($datamodel[$match[1]])) {
                    return ($datamodel[$match[1]]);
                }
                else {
                    return($match[0]);
                }
            }, $this->template);
            
            echo $this->output;
        }
        else {
            echo "TemplateError: The requested template ($this->template) could not be found in templates/$this->route.";

        }
    }
}

