<?php
require_once 'Vendor/doctrine2-dbal/lib/vendor/doctrine-common/lib/Doctrine/Common/ClassLoader.php';

$dLoader = new \Doctrine\Common\ClassLoader('Doctrine\DBAL', __DIR__ . '/Vendor/doctrine2-dbal/lib');
$dLoader->register();

$dcLoader = new \Doctrine\Common\ClassLoader('Doctrine\Common', __DIR__ . '/Vendor/doctrine2-dbal/lib/vendor/doctrine-common/lib');
$dcLoader->register();

$dbPath = __DIR__ . '/../data/data.db';

$params = array(
    'user' => 'root',
    'password' => 'root',
    'path' => $dbPath,
    'driver' => 'pdo_sqlite',
);

$con = \Doctrine\DBAL\DriverManager::getConnection($params);
