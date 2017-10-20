<?php
require_once(__DIR__ . "/./../bootstrat.php");
class Chain2Test extends PHPUnit_Framework_TestCase
{
    public function setUp(){ }
    public function tearDown(){ }
    public function testFindByOpenId() {

        $request = new Request(null,0);
        $h = new Handler();
        $h1 = new Handler1($h, 1);
        $h2 = new Handler2($h1,0);
        $h2->hander($request); //h1 ??
    }
}
