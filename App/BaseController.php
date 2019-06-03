<?php

namespace App;

use GuzzleHttp\Psr7\Response;
use Orm\NumberValidator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class BaseController
{
    use NumberValidator;

    // Stash headers for cookies etc here.
    protected $headers = [];

    abstract function execute(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface;

    function html(string $html, int $status = null): ResponseInterface {
        return $this->response('text/html; charset=utf-8', $html, $status);
    }

    function json(string $data, int $status = null): ResponseInterface {
        return $this->response('application/json', json_encode($data), $status);
    }

    function response(string $type, string $body, int $status): ResponseInterface {
        $this->headers['Content-Type'] = $type;
        return new Response($status, $this->headers, $body);
    }
}