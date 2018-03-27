<?php
// NEEDED FOR SIMULATING HTTP REQUEST VIA PHP CLI:
$uri = "https://www.affinity360.com/home?action=someaction";
$_GET['action'] = "someaction";


/** AUTOLOADER
  * Autoload our application classes. **/
spl_autoload_register(function ($class) {
    if (file_exists("src/{$class}.php")) {
        include "src/{$class}.php";
    }
});


/** FOUNDATION
  * Initialize application foundation and helpers. **/
$f = new Foundation();
$err = $f->errorHandler("errorHandler");


/** INITIALIZE
  * Run our application! **/
$app = new Application();
$db  = new Database();
$t   = new UnitTesting();
$app->route($uri);
$app->render();
