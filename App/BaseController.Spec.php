<?php
require_once('BaseController.php');

use App\BaseController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class MockController extends BaseController
{
    function execute(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        return $this->json('');
    }
}

$controller = new MockController();


$response = $controller->html('<blink>oh dear</blink>');
assert('<blink>oh dear</blink>' === (string)$response->getBody());
assert(strpos($response->getHeader('Content-Type')[0], 'text/html') !== false);
assert(strpos($response->getHeader('contenT-typE')[0], 'text/html') !== false);
assert($response->getStatusCode() === 200);

$response = $controller->html('Serato', 404);
assert($response->getStatusCode() === 404);

try {
    $response = $controller->html('Serato', 99);
    throw new TestFailedException('InvalidArgumentException', 99);
} catch (\Util\InvalidArgumentException $e) {
}

$response = $controller->json(3.142);
assert('3.142' === (string)$response->getBody(), 'BaseController->json()');
assert($response->getHeader('Content-Type')[0] === 'application/json');
assert($response->getHeader('contenT-typE')[0] === 'application/json');
assert($response->getStatusCode() === 200);

$response = $controller->json([(object)array('foo' => 'bar')]);
assert('[{"foo":"bar"}]' === (string)$response->getBody());


$response = $controller->html('Serato', 304);
assert($response->getStatusCode() === 304);

try {
    $response = $controller->html('Serato', 1009);
    throw new TestFailedException('InvalidArgumentException', 1009);
} catch (\Util\InvalidArgumentException $e) {
}

