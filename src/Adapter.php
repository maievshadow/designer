<?php
namespace Command\Adapter;
interface ITarget
{
    function service();
    function addService();
}

class Target implements ITarget
{
    public function service()
    {
        return 'target service';
    }

    public function addService()
    {
        return 'add no service in Adaptee';
    }
}


class Adaptee
{
    public function specificService()
    {
        return 'specificservice';
    }
}


class Adpater  extends Target
{
    private $adaptee ;
    public function service()
    {
        return $this->adaptee->specificService();
    }

    public function setAdaptee(Adaptee $a)
    {
        $this->adaptee = $a;
    }
}


