<?php
require_once(__DIR__ . "/./../bootstrat.php");
class ChainTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){ }
    public function tearDown(){ }
    public function testFindByOpenId() {
        $cc = new CommandChain();
        $cc->addCommand(new UserCommand());
        $cc->addCommand(new MailCommand());
        $cc->runCommand('addUser', null);
        $cc->runCommand('mail', null);
    }
}


