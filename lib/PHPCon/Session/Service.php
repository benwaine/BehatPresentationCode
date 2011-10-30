<?php
namespace PHPCon\Session;

class Service 
{

    protected $mapper;
    
    public function __construct($mapper) 
    {
        $this->mapper = $mapper;
    }
    
    public function findSessions($conferenceId)
    {
        // Use the mapper to find all conference sessions.
        return array();
    }

    
}


