<?php
/**
 * 路由配置文件
 * Name: route.php-Dphp
 * Author: lidongyun@shuwang-tech.com
 * Date: 2017/12/18
 * Time: 13:57
 */

return [
    [
        ['GET', '/', 'indexController'],
        // 指向adminController
        ['GET','/admin',''],
        ['GET','/user[/{action}]','userController'],
        /*['GET','/user/{id:\d+}/{name}','userController'],*/
    ],

    '/admin' => [
        // 指向adminUserController
        ['GET', '/user', '']
    ]
];