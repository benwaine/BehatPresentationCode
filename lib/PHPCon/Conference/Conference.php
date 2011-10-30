<?php
namespace PHPCon\Conference;

class Conference 
{

    protected $id;
    
    protected $name;
    
    protected $description;
    
    protected $date;

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

    public function getDescription() 
    {
        return $this->description;
    }

    public function setDescription($description) 
    {
        $this->description = $description;
    }

    public function getDate() 
    {
        return $this->date;
    }

    public function setDate($date) 
    {
        $this->date = $date;
    }


    
}



