<?php

namespace App;

require_once('Util/EmailAddressValidator.php');
require_once('Util/NumberValidator.php');

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Util\EmailAddressValidator;
use Util\NumberValidator;

abstract class BaseController
{
    use NumberValidator;
    use EmailAddressValidator;

    // Stash headers for cookies etc here.
    protected $headers = [];

    abstract function execute(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface;

    function html(string $html, int $status = 200): ResponseInterface
    {
        return $this->response('text/html; charset=utf-8', $html, $status);
    }

    function json($data, int $status = 200): ResponseInterface
    {
        return $this->response('application/json', json_encode($data), $status);
    }

    function response(string $type, string $body, int $status): ResponseInterface
    {
        $status = $this->validIntegerInRange($status, 100, 999);
        $this->headers['Content-Type'] = $type;
        return new Response($status, $this->headers, $body);
    }
}