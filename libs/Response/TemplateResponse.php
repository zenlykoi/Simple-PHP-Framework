<?php

/**
 * @see http://platesphp.com/v3/
 */

namespace App\Libs\Response;


use League\Plates\Engine;

class TemplateResponse 
{

	private string $templateFolder = ROOT_FOLDER . '/core/views/';
	private Engine $engine;

	public function __construct (string $templatePath, $data, int $statusCode = 200)
	{
		$this->checkFileExist($templatePath);

		$this->engine = new Engine($this->templateFolder);

		$this->setStatusCode($statusCode);

		$this->setHeader();

		echo $this->engine->render($templatePath, $data);

		die();
	}

	private function checkFileExist ($templatePath)
    {
        if (!file_exists($this->templateFolder . $templatePath . '.php'))
        {
            http_response_code(404);
            die();
        }
    }

    private function setStatusCode ($statusCode)
    {
        http_response_code($statusCode);
    }

    private function setHeader ()
    {
        header("Content-Type: text/html; charset=utf-8");
    }

}