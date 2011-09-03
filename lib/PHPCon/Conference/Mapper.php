<?php

namespace PHPCon\Conference;

use PHPCon\Conference\Conference as Conf;

class Mapper
{

    protected $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM conference";

        $conferences = $this->connection->fetchAll($sql);
        
        $confObs = $this->handleResults($conferences);
        
        return $confObs;
    }

    protected function handleResult($result)
    {
        $confOb = new Conf();
        $confOb->setId($result['id']);
        $confOb->setName($result['name']);
        $confOb->setDescription($result['description']);

        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $result['date']);

        if ($date)
        {
            $confOb->setDate($date);
        }

        return $confOb;
    }

    protected function handleResults(array $results)
    {
        $confObs = array();

        foreach ($results as $result)
        {
            $confObs[] = $this->handleResult($result);
        }

        return $confObs;
    }

}

