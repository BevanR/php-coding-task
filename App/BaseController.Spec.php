<?php
require_once('BaseController.php');

use App\BaseController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

// Setup tests.
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

function assertHeader(string $name, string $contains, ResponseInterface $response) {
    assert(strpos($response->getHeader($name)[0], $contains) !== false);

}

// Test HTML response.
$response = $controller->html('<blink>oh dear</blink>');
assert('<blink>oh dear</blink>' === (string)$response->getBody());
assert($response->getStatusCode() === 200);

// Test case insensitivity of header names.
assertHeader('Content-Type', 'text/html', $response);
assertHeader('contenT-typE', 'text/html', $response);

// Test custom status code.
$response = $controller->html('Serato', 404);
assert($response->getStatusCode() === 404);


// Test JSON body.
$response = $controller->json([(object)array('foo' => 'bar')]);
assert('[{"foo":"bar"}]' === (string)$response->getBody());
assertHeader('Content-Type', 'application/json', $response);

// Test primitive/scalar values in JSON responses.
$response = $controller->json(3.142);
assert('3.142' === (string)$response->getBody(), 'BaseController->json()');
assert($response->getStatusCode() === 200);

// Test low status codes are invalid.
try {
    $response = $controller->html('Serato', 99);
    throw new TestFailedException('InvalidArgumentException', 99);
} catch (\Util\InvalidArgumentException $e) {
}

// Test high status codes are invalid.
try {
    $response = $controller->html('Serato', 1009);
    throw new TestFailedException('InvalidArgumentException', 1009);
} catch (\Util\InvalidArgumentException $e) {
}
