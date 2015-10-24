<?php
interface IOperation
{
	public function compute($a, $b);
}

class Add implements IOperation
{
	public function compute($a, $b) {
		return ($a + $b);
	}
}

class Sub implements IOperation
{
	public function compute($a, $b) {
		return $a > $b ? $a - $b : $b - $a;
	}
}

class Expression
{
	public function __construct($operation, $a, $b){
		switch($operation){
			case '+':
				$this->_operation = new Add;
				break;
			case '-':
				$this->_operation = new Sub;
				break;
			default:
				break;
		}

		$this->_operand = array($a, $b);
	}

	public function compute() {
		$this->_result = $this->_operation->compute($this->_operand[0], $this->_operand[1]);
	}

	public function result() {
		return $this->_result;
	}

	private $_operation;
	private $_result;
	private $_operand = null;
}

$expression = new Expression('+', 1, 2);
$expression->compute();
$result = $expression->result();
var_dump($result);

$expression = new Expression('-', 1, 2);
$expression->compute();
$result = $expression->result();
var_dump($result);
