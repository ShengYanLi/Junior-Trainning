<?php
// database.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);

// database configuration parameters
$conn = array(
    'driver' => 'mysqli',
    'host' => '127.0.0.1',
    'dbname' => 'msgboard',
    'user' => 'root',
    'password' => '1qaz'
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
