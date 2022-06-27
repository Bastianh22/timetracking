<?php

class Tache
{
    /**
    * Id de la tâche
    * @var Integer
    */
    private $tasks_id;
    /**
    * Nom de la tâche
    * @var string
    */
    private $name;
    /**
    * durée de la tâche
    * @var string
    */
    private $duration;
    /**
    * Date de debut de la tâche
    * @var date
    */
    private $date;

    function __construct($tasks_id, $name, $duration, $date) 
    {
        $this->tasks_id = $tasks_id;
        $this->name = $name;
        $this->duration = $duration;
        $this->date = $date;
    }
    
    function getTasks_id()
    {
        return $this->tasks_id;
    }

    function setTasks_id($tasks_id) 
    {
        $this->tasks_id = $tasks_id;
    }
    
    function getName() 
    {
       return $this->name;
    }

    function getDuration() 
    {
       return $this->duration;
    }

    function getDate()
    {
       return $this->date;
    }

    function setName($name) 
    {
       $this->name = $name;
    }

    function setDuration($duration) 
    {
       $this->duration = $duration;
    }

    function setDate($date) 
    {
       $this->date = $date;
    }
}
