<?php
class ChainTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){ }
    public function tearDown(){ }
    public function testFindByOpenId() {
        $cc = new CommandChain();
        $cc->addCommand(new UserCommand());
        $cc->addCommand(new MailCommand());

        $this->assertEquals("addUser", $cc->runCommand("addUser", null));
        $this->assertEquals("mail", $cc->runCommand("mail", null));
    }
}


