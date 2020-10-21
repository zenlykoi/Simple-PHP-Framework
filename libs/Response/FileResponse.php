<?php

namespace App\Libs\Response;


class FileResponse
{

    private $storeFolder = ROOT_FOLDER . '/store/';
    private $fullPath;
    private $fileName;

    public function __construct($filePath,int $statusCode = 200)
    {
        $this->fullPath = $this->storeFolder . $filePath;
        $this->fileName = basename($this->fullPath);

        $this->checkFileExist();

        $this->setStatusCode($statusCode);
        $this->setHeader();

        readfile($this->fullPath);
        die();
    }

    private function checkFileExist ()
    {
        if (!file_exists($this->fullPath))
        {
            http_response_code(404);
            die("Error: File not found!");
        }
    }

    private function setStatusCode ($statusCode)
    {
        http_response_code($statusCode);
    }

    private function setHeader ()
    {
        header("Cache-Control: public");
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary");
        header("Content-Length:" . filesize($this->fullPath));
        header("Content-Disposition: attachment; filename=" . $this->fileName);
    }
}
