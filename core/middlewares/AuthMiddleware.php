<?php

namespace App\Core\Middlewares;

use MiladRahimi\PhpRouter\Middleware;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class AuthMiddleware implements Middleware
{
	
	public function handle(ServerRequestInterface $request, $next)
    {
    	$queryParams = $request->getQueryParams();

    	if(isset($queryParams['ok']) && $queryParams['ok'] == 'true') return $next($request);
        
        return new JsonResponse(['error' => 'Unauthorized!'], 401);
    }

}