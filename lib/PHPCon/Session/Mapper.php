<?php
namespace PHPCon\Session;

class Mapper
{
    protected $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    
    public function fetchByConferenceId($id)
    {
        // Write sql to fetch sessions from the database
        
        // Use handle results to get an array of session objects
        
        // return them
        
        return array();
    }
    
    protected function handleResults($results)
    {
        $sessions = array();
        
        foreach($results as $result) 
        {
            $sessions[] = $this->handleResult($result);
        }
        
        return $sessions;
    }
    
    protected function handleResult($result) 
    {
        $sessionOb = new Session();
        
        $sessionOb->setId($result['id']);
        $sessionOb->setName($result['name']);
        $sessionOb->setSpeaker($result['speaker']);
        
        $time = \DateTime::createFromFormat('Y-m-d H:i:s', $result['stime']);
        
        if($time)
        {
            $sessionOb->setTime($time);
        }
        
        return $sessionOb;
        
    }
    
    
}

