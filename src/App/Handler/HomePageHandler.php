<?php declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response;

class HomePageHandler implements RequestHandlerInterface
{
    protected $defaultName;

    public function __construct($defaultName)
    {
        $this->defaultName = $defaultName;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();
        $response->getBody()->write("Hello " . $this->defaultName);
        return $response;
    }
}
