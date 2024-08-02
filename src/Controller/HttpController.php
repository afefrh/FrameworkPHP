<?php
namespace App\Controller;

class HttpController extends GlobalController
{
    public function index()
    {
        $this->response->setContent("bnj");
        $this->response->send();
    }
}
