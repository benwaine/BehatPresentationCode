<?php

require_once __DIR__ . '/../lib/include.php';

$queries = array();

$queries[] = 'CREATE TABLE conference (
                id INTEGER PRIMARY KEY,
                name TEXT,
                description TEXT,
                cdate DATE)';

$queries[] = 'CREATE TABLE session (
                id INTEGER PRIMARY KEY,
                name TEXT,
                speaker TEXT,
                stime DATE,
                conference_id INTEGER)';

foreach($queries as $q)
{
    $con->query($q);
}

