<?php

/** 路由规则
 * Name: route.php-Dphp
 * User: lidongyun@shuwang-tech.com
 * Date: 2017/8/29
 */
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

// 配置路由
$dispatcher = simpleDispatcher(function (RouteCollector $r) {
    $r->get("/[/]", 'Index/index');
    $r->get("/{app}[/]", "app");
    $r->get("/{app}/{class}[/]", "class");
    $r->get("/{app}/{class}/{action}[/]", "action");
});

// 获取http传参方式和URI
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = strtolower($_SERVER['REQUEST_URI']);

// 将url中的get传参方式（?foo=bar）剥离并进行解析(即不允许使用?foo=bar形式传参)
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

// 对url进行转码
$uri = rawurldecode($uri);
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        header("Location:/errors/404.html");
        // ... 404 Not Found
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 403 Method Not Allowed
        echo 403;
        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];

        $vars = $routeInfo[2];
        // 通过$vars调用$handler
        if (empty($vars)) {
            list($class, $action) = explode("/", $handler, 3);
        } else {
            foreach ($vars as $key => $value) {
                $$key = $value;
            }
        }
        $app = "App\\" . ucfirst(!isset($app) ? "Index" : $app) . '\\controller\\';
        // echo $app.'<br/>';
        $class = $app . ucfirst(!isset($class) ? "Index" : $class) . "Controller";
        // echo $class.'<br/>';
        $action = 'action' . join(array_map("ucfirst", !isset($action) ? ["index"] : explode('_', $action)));
        // die($action);
        call_user_func_array(array(new $class, $action), $vars);

        break;
}