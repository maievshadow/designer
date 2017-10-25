<?php
namespace Command\Strategy;
interface IStrategy
{
	function find($data);
}

class OddStrategy implements IStrategy
{
	public function find($data)
	{
		return array(1, 3, 5);
	}
}

class EvenStrategy implements IStrategy
{
	public function find($data)
	{
		return array(2, 4, 6);
	}
}

class Big2Strategy implements IStrategy
{
	public function find($data){
		return array(3, 4, 5);
	}
}

class A
{
	public function find(IStrategy $a) {
		$this->_result = $a->find($this->_a);
	}

	public function result()
	{
		return $this->_result;
	}

	private $_result;
	private $_a = array(1, 2, 3, 4, 5, 6);
}

/*
$odd = new OddStrategy;
$even = new EvenStrategy;
$big2 = new Big2Strategy;

$a = new A;

$a->find($odd);
$result1 = $a->result();
$a->find($even);
$result2 = $a->result();
$a->find($big2);
$result3 = $a->result();

var_dump($result1, $result2, $result3);
*/

