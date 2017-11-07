<?php
namespace Memento;
class Memento{

    private $state;

    public function getState(){
        return $this->state;
    }

    public function setState($state){
        $this->state = $state;
    }

    public function __construct($state) {
//        $this->state = $state;
    }
}

class Originator{

    private $state;

    public function getState(){
        return $this->state;
    }

    public function setState($state){
        $this->state = $state;
    }

    public function showState() {
        echo $this->state ."\r\n";
        return 1;
    }

    public function createMemento(){
       return new Memento($this->state);
    }

    public function restoreMemento(Memento $memento){
        $this->state = $memento->getState();
    }
}

class Caretaker{

    private $memento;

    public function getMemento(){
        return $this->memento;
    }

    public function setMemento(Memento $memento){
        $this->memento = $memento;
    }

}