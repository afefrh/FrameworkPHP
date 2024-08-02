<?php
namespace App\Http;

class Request
{
    public function getUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

}
