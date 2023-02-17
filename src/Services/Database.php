<?php

namespace App\Services;

use League\Container\ServiceProvider\BootableServiceProviderInterface;
use League\Container\ServiceProvider\AbstractServiceProvider;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\ORMSetup;

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
            $configuration = $this->container->get('config');

            return DriverManager::getConnection($configuration['database'], ORMSetup::createAttributeMetadataConfiguration([
                realpath(__DIR__ . '/../Entities')
            ], $configuration['debug'] ?? false));
        });

        $this->container->addShared(EntityManagerInterface::class, function () {
            $configuration = $this->container->get('config');

            return new EntityManager($this->container->get(Connection::class), ORMSetup::createAttributeMetadataConfiguration([
                realpath(__DIR__ . '/../Entities')
            ], $configuration['debug'] ?? false));
        });
    }

    /**
     * Method will be invoked on registration of a service provider implementing
     * this interface. Provides ability for eager loading of Service Providers.
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
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
