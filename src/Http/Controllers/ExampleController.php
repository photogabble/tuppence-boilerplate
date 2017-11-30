<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ExampleController extends Controller
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return \Zend\Diactoros\Response\HtmlResponse
     */
    public function index(ServerRequestInterface $request, ResponseInterface $response, array $args = [])
    {
        return $this->view('home');
    }
}