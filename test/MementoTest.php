<?php
class MementoTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){

    }
    public function tearDown(){

    }

    public function testFindByOpenId() {

        $org = new \Memento\Originator();
        $ctk = new \Memento\Caretaker();

        $org->setState("开会中");

        $ctk->setMemento($org->createMemento());//将数据封装在Caretaker

        $org->setState("睡觉中");
        $org->showState();//显示

        $org->restoreMemento($ctk->getMemento());//将数据重新导入
        $org->showState();

    }
}