<?php

require_once __DIR__ . '/../lib/include.php';

$queries = array();

$queries[] = "INSERT INTO conference VALUES (null, 'PHPNW', 'A GREAT CONFERENCE!', '2011-10-08 09:00:00')";
$queries[] = "INSERT INTO conference VALUES (null, 'PBC11', 'A GREAT CONFERENCE!', '2011-10-28 09:00:00')";
$queries[] = "INSERT INTO conference VALUES (null, 'PHPUK', 'A GREAT CONFERENCE!', '2012-10-27 09:00:00')";

$queries[] = "INSERT INTO session VALUES (null, 'Integration Testing', 'Ben Waine', '2011-10-08 10:00:00', 1)";
$queries[] = "INSERT INTO session VALUES (null, 'Xdebug', 'Derick Rethans', '2011-10-08 13:00:00', 1)";
$queries[] = "INSERT INTO session VALUES (null, 'Zend Framework', 'Matthew Weier OPhinney', '2011-10-08 12:00:00', 1)";

foreach($queries as $q)
{
    $con->query($q);
}
