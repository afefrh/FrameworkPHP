<?php
namespace App\Controller;

use App\Http\Request;
use App\Http\Response;

class HttpController
{
    public function index(Request $request, Response $response): void
    {
        $response->setContent("hellooo");
        $response->send();
    }
}
