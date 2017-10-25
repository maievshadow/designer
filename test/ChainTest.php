<?php
class ChainTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){ }
    public function tearDown(){ }
    public function testFindByOpenId() {
        $cc = new \Command\Chain\CommandChain();
        $cc->addCommand(new \Command\Chain\UserCommand());
        $cc->addCommand(new \Command\Chain\MailCommand());

        $this->assertEquals("addUser", $cc->runCommand("addUser", null));
        $this->assertEquals("mail", $cc->runCommand("mail", null));
    }
}


