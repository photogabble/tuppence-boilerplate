<?php

namespace App\Tests\Feature;

use App\Tests\BootsApp;
use Laminas\Diactoros\ServerRequestFactory;

class RoutesTest extends BootsApp
{
    public function testRoute()
    {
        $response = $this->runRequest(ServerRequestFactory::fromGlobals([
            'HTTP_HOST' => 'example.com',
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI' => '/',
        ], [], [], [], []));

        $this->assertResponseOk();
        $this->assertEquals('<h1>Hello World!</h1>', $response);
    }
}
