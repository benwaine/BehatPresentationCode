<?php
namespace PHPCon\Session;

class Session 
{
    
    protected $id;
    
    protected $name;
    
    protected $speaker;
    
    protected $time;


    public function getId() 
    {
        return $this->id;
    }

    public function setId($id) 
    {
        $this->id = $id;
    }

    public function getName() 
    {
        return $this->name;
    }

    public function setName($name) 
    {
        $this->name = $name;
    }

    public function getSpeaker() 
    {
        return $this->speaker;
    }

    public function setSpeaker($speaker) 
    {
        $this->speaker = $speaker;
    }

    public function getTime() 
    {
        return $this->time;
    }

    public function setTime($time) 
    {
        $this->time = $time;
    }
   
}


