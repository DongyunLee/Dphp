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
    $r->get("/[/]", 'Index/Index/index');
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
    // 使用未定义路由格式
    case Dispatcher::NOT_FOUND:
        if (DEBUG) {
            throw new ErrorException("404 NOT FOUND");
        } else {
            \notFound();
        }
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 403 Method Not Allowed
        throw new Error("403 NOT ALLOWED");
        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // 通过$vars调用$handler
        if (empty($vars)) {
            list($app, $class, $action) = explode("/", $handler, 3);
        } else {
            foreach ($vars as $key => $value)
                $$key = $value;
        }

        $app = ucfirst(!isset($app) ? "Index" : $app);
        $class = ucfirst(!isset($class) ? "Index" : $class);
        $action = join(array_map("ucfirst", !isset($action) ? ["index"] : explode('_', $action)));
        $_SESSION['route'] = [
            'app' => $app,
            'class' => $class,
            'action' => $action,
        ];
        $app = "App\\" . $app . '\\controller\\';
        $class = $app . $class . "Controller";
        $action = 'action' . $action;
        $_SESSION['route']['route'] = $class;


        // 调用不存在的类下的方法时，使用自定义错误进行处理
        call_user_func_array(array(new $class, $action), $vars);
        break;


}