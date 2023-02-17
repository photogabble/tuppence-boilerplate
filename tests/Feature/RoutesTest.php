<?php

namespace App\Tests\Feature;

use App\Tests\BootsApp;
use Laminas\Diactoros\ServerRequestFactory;

final class RoutesTest extends BootsApp
{
    public function testRoute()
    {
        $response = $this->runRequest(ServerRequestFactory::fromGlobals([
            'HTTP_HOST' => 'example.com',
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI' => '/',
        ]));

        $this->assertResponseOk();
        $this->assertEquals('<h1>Hello world!</h1>', $response);
    }

    public function testNotFoundRoute()
    {
        $response = $this->runRequest(ServerRequestFactory::fromGlobals([
            'HTTP_HOST' => 'example.com',
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI' => '/test',
        ]));
        $this->assertResponseCodeEquals(404);
        $this->assertEquals('File not found.', $response);
    }
}
