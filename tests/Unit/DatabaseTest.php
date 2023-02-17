<?php

namespace App\Tests\Unit;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\Tools\SchemaTool;
use PHPUnit\Framework\TestCase;

final class DatabaseTest extends TestCase
{
    /**
     * @var EntityManager
     */
    protected static $em;

    /**
     * This method is called before the first test of this test class is run.
     *
     * @inheritdoc
     */
    public static function setUpBeforeClass(): void
    {
        $configuration = include __DIR__ . '/../../config.php';

        $dbConfiguration = ORMSetup::createAttributeMetadataConfiguration([
            realpath(__DIR__ . '/../../src/Entities')
        ], $configuration['debug'] ?? false);

        $connection = DriverManager::getConnection($configuration['database'], $dbConfiguration);
        $em = new EntityManager($connection, $dbConfiguration);

        $tool = new SchemaTool($em);
        $tool->dropDatabase();
        $tool->createSchema($em->getMetadataFactory()->getAllMetadata());

        self::$em = $em;
    }

    public function testEntity()
    {
        $this->assertTrue(true); // ...
    }
}
