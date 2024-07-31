<?php

namespace FrameworkPH\Controller;

class GlobalController extends RequestController
{
    public function index(): void
    {
        $this->sendResponse(['message' => 'bnj']);
    }
}
