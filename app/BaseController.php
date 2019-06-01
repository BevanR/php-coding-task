<?php

namespace app;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class BaseController
{
    abstract function execute(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface;

    function html(string $html, int $status = 200, string $reason = 'OK'): ResponseInterface {
        $headers = [];
        $headers['Content-Type'] = 'text/html; charset=utf-8';
        return new Response($status, $reason, $headers, $html);
    }
}