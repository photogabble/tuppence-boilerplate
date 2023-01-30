<?php

namespace App\Services;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class Database extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    protected array $provides = [
        EntityManagerInterface::class,
        Connection::class
    ];

    /**
     * Use the register method to register items with the container via the
     * protected $this->container property or the `getContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */
    public function register():void
    {

        $this->container->addShared(Connection::class, function () {
            $configuration = $this->getContainer()->get('config');
            return DriverManager::getConnection($configuration['database'], new \Doctrine\DBAL\Configuration());
        });

        $this->container->addShared(EntityManagerInterface::class, function () {
            $configuration = $this->getContainer()->get('config');

            return EntityManager::create(
                $configuration['database'],
                Setup::createAnnotationMetadataConfiguration(
                    [
                        realpath(__DIR__ . '/../Entities')
                    ],
                    $configuration['debug']
                )
            );
        });
    }

    /**
     * Method will be invoked on registration of a service provider implementing
     * this interface. Provides ability for eager loading of Service Providers.
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     *
     * @return void
     */
    public function boot():void
    {
        // ...
    }

    public function provides(string $id): bool
    {
        return in_array($id, $this->provides);
    }
}
