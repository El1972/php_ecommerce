<?php

class Router
{

    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include $routesPath;
    }

    public function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri = $this->getUri();

        foreach ($this->routes as $uriPath => $path) {

            if (preg_match("~$uriPath~", $uri)) {

                $internalRoutes = preg_replace("~$uriPath~", $path, $uri);

                $segments = explode('/', $internalRoutes);

                $controllerName = ucfirst(array_shift($segments)) . 'Controller';

                $actionName = 'action' . ucfirst(array_shift($segments));

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                $parameters = $segments;

                if (file_exists($controllerFile)) {
                    include_once $controllerFile;
                }

                $controllerObj = new $controllerName;

                $result = call_user_func_array(array($controllerObj, $actionName), $parameters);

                if ($result != null) {
                    break;
                }
            }
        }
    }

}
