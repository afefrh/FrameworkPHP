<?php

namespace FrameworkPH\Controller;

class RequestController
{
    public function handleRequest(): void
    {
        
    }

    public function sendResponse(array $data, int $status = 200): void
    {
        http_response_code($status);
    }
}
