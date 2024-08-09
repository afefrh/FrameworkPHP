<?php

use App\Http\Request;
use App\Http\Response;

return [
    Request::class => function () {
        return new Request();
    },
    Response::class => function () {
        return new Response();
    }
];
