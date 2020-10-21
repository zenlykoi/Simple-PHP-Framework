<?php

/**
 * @see https://github.com/miladrahimi/phprouter
 */

use MiladRahimi\PhpRouter\Router;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;
use Zend\Diactoros\Response\HtmlResponse;
use App\Libs\Response\TemplateResponse;
use App\Core\Controllers\UserController;
use App\Core\Middlewares\AuthMiddleware;

/**
 * ======================================START==================================================
 */

$router = new Router('', 'App\Core\Controllers');

$router->get('/', function () {
    return new TemplateResponse('pages/welcome',[
    	'greet' => 'Hello World'
    ]);
});

$router->get('/user/{id}', 'UserController@getUser');

$router->get('/user/image', 'UserController@getImage');

$router->post('/user/pay', 'UserController@postPay', AuthMiddleware::class);

$router->get('/user/create/{username}', 'UserController@getCreate');

$router->get('/view', 'UserController@getView');

/**
 * ======================================END====================================================
 */

try 
{
    $router->dispatch();
} 
catch (RouteNotFoundException $err) 
{
    $router->getPublisher()->publish(new HtmlResponse('Not found.', 404));
} 
catch (Throwable $err) 
{
	if (DEBUG) print_r($err);
	else
    	$router->getPublisher()->publish(new HtmlResponse('Internal error.', 500));
}