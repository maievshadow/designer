<?php
class CommandTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){ }
    public function tearDown(){ }
    public function testFindByOpenId() {
        $receiver = new \Command\Receiver('phpppan');
        $command = new \Command\ConcreteCommand($receiver);
        $invoker = new \Command\Invoker($command);
        $this->assertEquals(1, $invoker->action());
    }
}