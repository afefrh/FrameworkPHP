<?php
namespace App\Http;

class Response
{
    private $content;
    private $statusCode = 200;

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function send()
    {
        http_response_code($this->statusCode);
        echo $this->content;
    }
}
