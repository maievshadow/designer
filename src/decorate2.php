<?php
class Sth{
	protected $price;

	protected $discount;

	public function getPrice(){
		return $this->price;
	}

	public function setDiscount($discount){
		$this->discount = $discount;
	}

	public function getDiscount(){
		return $this->discount;
	}

	public function __toString(){
		return __CLASS__;
	}
}

class Egg extends Sth{

	public function __construct(){
		$this->price = 0.5;
		$this->discount = 0;
	}

}

class Drink extends Sth{

	public function __construct(){
		$this->price = 1.0;
		$this->discount = 0;
	}
}

interface DecorateMilk{
	public function addDecorateMilk(Sth $sth);
	public function getDecorateName();
	public function getDiscount();
}

interface Decorate{
	function addDecorate(DecorateMilk $decorateMilk);
}

class Milk implements Decorate{

	public function addDecorate(DecorateMilk $decorateMilk){
		printf("before decorate, discount for is %s\r\n", $this->discount);
		$this->combinations[] = $decorateMilk->getDecorateName();
		$this->discount = $decorateMilk->getDiscount();
		printf("before decorate, discount for is %s\r\n", $this->discount);
	}

	private $price;

	private $discount;

	public $combinations = [];

	public function __construct(){
			$this->price = 1.0;
			$this->discount = 0;
	}

	public function getDiscount(){
		return $this->discount;
	}

	public function getPrice(){
		if (\count($this->combinations)){
			return $this->price * $this->discount;
		}else{
			return $this->price;
		}
	}
}

abstract class DecorateMilkImpl implements DecorateMilk{
	public $discount ;

	public $decorateName;

	public function addDecorateMilk(Sth $sth){
		//折扣计算模式1
		$sth->setDiscount($this->discount * 0.5);
	}

	public function getDiscount(){
		return $this->discount;
	}

	public function getDecorateName(){
		return $this->decorateName;
	}
}

class MilkEgg extends DecorateMilkImpl{

	public function __construct($discount){
		$this->decorateName = "egg-milk";
		$this->discount = $discount;
	}
}

class MilkDrink extends DecorateMilkImpl{
	public function __construct($discount){
		$this->decorateName = "drink-milk";
		$this->discount = $discount;
	}
}

function pf($milk){
	echo $milk->getDiscount();
	echo "\n\r";
	echo $milk->getPrice();
	echo "\n\r";
}

/*
$milk = new Milk();
$egg = new Egg();
$drink = new Drink();
$milk->addSth($egg);
$milk->addSth($drink);
 */


$milk = new Milk();

pf($milk);
$egg = new Egg();
$drink = new Drink();
$milkEgg = new MilkEgg(1);
$milkDrink = new MilkDrink(2);

$milkEgg->addDecorateMilk($egg);
$milkDrink->addDecorateMilk($drink);

$milk->addDecorate($milkEgg);
pf($milk);

$milk->addDecorate($milkDrink);

pf($milk);
