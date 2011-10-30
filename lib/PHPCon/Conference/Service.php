<?php
namespace PHPCon\Conference;

class Service 
{

    protected $mapper;
    
    public function __construct($mapper)
    {
        $this->mapper = $mapper;
    }
    
    public function findConferences()
    {
        return $this->mapper->fetchAll();
    }
    
    public function findConference($id)
    {
        return $this->mapper->find($id);
    }
    
    
}


