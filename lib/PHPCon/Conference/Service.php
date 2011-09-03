<?php
namespace PHPCon\Conference;

class Service 
{

    protected $mapper;
    
    public function __construct($mapper)
    {
        $this->mapper = $mapper;
    }
    
    public function create()
    {
        
    }
    
    public function findConferences()
    {
        return $this->mapper->fetchAll();
    }
    
    
}


