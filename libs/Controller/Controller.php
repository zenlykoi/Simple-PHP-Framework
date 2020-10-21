<?php

namespace App\Libs\Controller;

use App\Libs\Response\TemplateResponse;

class Controller
{
	
	protected function renderView (string $templatePath, $data, int $statusCode = 200)
	{
		return new TemplateResponse($templatePath, $data, $statusCode);
	}

}