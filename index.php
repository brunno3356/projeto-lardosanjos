/app
    /controllers
        HomeController.php
    /models
        AnimalModel.php
    /views
        home.php
    /core
        Router.php
/index.php
<?php
require_once 'app/core/Router.php';

$router = new Router();
$router->run();
?>
<?php
class Router {
    public function run() {
        $controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'HomeController';
        $methodName = isset($_GET['action']) ? $_GET['action'] : 'index';

        require_once "app/controllers/$controllerName.php";
        $controller = new $controllerName();
        $controller->$methodName();
    }
}
?>
