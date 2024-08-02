<?php
namespace App\Controller;

use App\Http\Request;
use App\Http\Response;

class GlobalController
{
    protected $request;
    protected $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
}
