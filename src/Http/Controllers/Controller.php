<?php

namespace App\Http\Controllers;

use Doctrine\ORM\EntityManagerInterface;
use League\Plates\Engine;
use Photogabble\Tuppence\App;
use Laminas\Diactoros\Response;

class Controller
{
    protected EntityManagerInterface $entityManager;

    protected App $app;

    protected Engine $plates;

    /**
     * ContentType constructor.
     *
     * @param Engine $plates
     * @param EntityManagerInterface $entityManager
     * @param App $app
     */
    public function __construct(Engine $plates, EntityManagerInterface $entityManager, App $app)
    {
        $this->entityManager = $entityManager;
        $this->app = $app;
        $this->plates = $plates;
    }

    /**
     * @param string $template
     * @param array $values
     * @param int $status
     * @param array $headers
     *
     * @return Response
     */
    protected function view(string $template, array $values = [], int $status = 200, array$headers = []): Response
    {
        $response = new Response('php://memory', $status, $headers);
        $response->getBody()->write($this->plates->render($template, $values));
        return $response;
    }
}
