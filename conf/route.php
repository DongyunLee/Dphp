<?php

/** 路由规则
* Name: route.php-Dphp
* User: lidongyun@shuwang-tech.com
* Date: 2017/8/29
*/

// 配置路由
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r){
    $r->get("/",'default_page');
    // $r->get("/fuck",'fuck_me');
    $r->get("/{index}[/{module}]",'module_name');
});

// 获取http传参方式和URI
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// 将url中的get传参方式（?foo=bar）剥离并进行解析(即不允许使用?foo=bar形式传参)
if (false !== $pos = strpos($uri, '?'))
    $uri = substr($uri, 0, $pos);

// 对url进行转码
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        die("<script>window.location.href='/errors/404.html';</script>");
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 403 Method Not Allowed
        echo 403;
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        echo $handler;
        // ... call $handler with $vars
        break;
}