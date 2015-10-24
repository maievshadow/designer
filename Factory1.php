<?php

interface IA
{
	function aa();
}

class A1 implements IA
{
	public function __construct()
	{
	}

	public function aa()
	{
		echo "A1 --- aa\n";
	}
}

class A2 implements IA
{
	public function __construct()
	{
	}

	public function aa()
	{
		echo "A2 --- aa\n";
	}
}

interface IB
{
	function bb();
}

class B1 implements IB
{
	public function __construct()
	{
	}

	public function bb()
	{
		echo "B1 --- bb\n";
	}
}

class B2 implements IB
{
	public function __construct()
	{
	}

	public function bb()
	{
		echo "B2 --- bb\n";
	}
}

$a1 = new A1;
$a2 = new A2;

$b1 = new B1;
$b2 = new B2;

interface IFactory
{
	function createA(IA $a);
	function createB(IB $b);
}

class Factory implements IFactory
{
	public function __construct()
	{
	}

	public function createA(IA $a)
	{
		$this->_a = $a;
	}

	public function createB(IB $b)
	{
		$this->_b = $b;
	}

	public function result()
	{
		$this->_a->aa();
		$this->_b->bb();
	}

	private $_a;
	private $_b;
}

$factory1 = new Factory;
$factory1->createA($a1);
$factory1->createB($b1);
$factory1->result();

$factory2 = new Factory;
$factory2->createA($a1);
$factory2->createB($b2);
$factory2->result();

$factory3 = new Factory;
$factory3->createA($a1);
$factory3->createB($b2);
$factory3->result();

$factory4 = new Factory;
$factory4->createA($a2);
$factory4->createB($b1);
$factory4->result();

