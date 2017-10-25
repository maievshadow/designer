<?php
class Chain2Test extends PHPUnit_Framework_TestCase
{
    public function setUp(){ }
    public function tearDown(){ }
    public function testFindByOpenId() {

        $request = new \Command\Chain\Request(null,0);
        $h = new \Command\Chain\Handler();
        $h1 = new \Command\Chain\Handler1($h, 1);
        $h2 = new \Command\Chain\Handler2($h1,0);

        $this->assertEquals("handler1", $h2->hander($request));
    }
}
