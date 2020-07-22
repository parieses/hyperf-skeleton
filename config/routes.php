<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\HttpServer\Router\Router;
use App\Middleware\Auth\TokenMiddleware;

Router::get('/admin/login','App\Admin\Controller\IndexController@index');
Router::addGroup(
    '/admin/',function (){
    Router::get('index','App\Admin\Controller\IndexController@index');
    },
    ['middleware' => [TokenMiddleware::class]]
);
Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');
Router::addRoute(['GET', 'POST', 'HEAD'], '/test', 'App\Controller\IndexController@test');
Router::addRoute(['GET', 'POST', 'HEAD'], '/update', 'App\Controller\IndexController@update');
