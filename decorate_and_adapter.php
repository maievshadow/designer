<?php
##decorate
abstract class Component{
	abstract public function operation();
}

class ConcreteComponent extends Component{
	public function operation(){
		return 1;
	}
}

class Decorate extends Component{
	private $_component;

	public function __construct(Component $component){
		$this->_component = $component;
	}

	public function operation(){
		return $this->_component->operation();
	}
}

class ConcreteDecorateA extends Decorate{
	public function __construct($comp){
		parent::__construct($comp);
	}

	public function addDecorateOperationA(){
		return 'A';
	}
}

class ConcreteDecorateB extends Decorate{
	public function __construct($comp){
		parent::__construct($comp);
	}

	public function addDecorateOperationB(){
		return 'B';
	}
} 

##adapter...
class A{
	public function a1(){
		return 'a1';
	}
}
class B{
	public function b1(){
		return 'b1';
	}
}

interface AB{
	public function hello_a_b();
}

class Adapter implements AB{
	private $_a;
	private $_b;
	public function __construct(A $a, B $b){
		$this->_a = $a;
		$this->_b = $b;
	}

	public function hello_a_b() {
		$a1 = $this->_a->a1();
		$b1 = $this->_b->b1();

		return $a1.$b1;
	}
}

class Adaptee extends Adapter{
	public function __construct($a, $b){
		parent::__construct($a, $b);
	}
}
