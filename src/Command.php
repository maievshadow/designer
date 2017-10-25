<?php
namespace Command;
interface Command{
    function execute();
};

//请求者
class Invoker{

    private $command;

    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    public function action(){
        return $this->command->execute();
    }
};

class Receiver{

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function action(){
        return 1;
    }
}



class ConcreteCommand implements Command{

    private $receiver;

    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute()
    {
        return $this->receiver->action();
    }

}


