<?php
class Sth{
	protected $price;

	protected $discount;

	public function getPrice(){
		return $this->price;
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
	public function addMilk(Sth $sth);
}

class Milk{

	private $price;

	private $discount;

	public $isCombinate;

	public function __construct(){
			$this->price = 1.0;
			$this->discount = 0;
	}

	public function setPrice($price){
		$this->price = $price;
	}

	public function setDiscount($discount){
		$this->discount = $discount;
	}

	public function getDiscount(){
		return $this->discount;
	}

	public function getPrice(){
		if ($this->isCombinate){
			return $this->price * $this->discount;
		}else{
			return $this->price;
		}
	}
}

abstract class DecorateMilkImpl implements DecorateMilk{
	protected $milk;
	protected $discount;
	public function addMilk(Sth $sth){
		printf("\r\n{get_class($sth)}\r\n");
		$this->milk->isCombinate = 1;
		$this->milk->setDiscount($this->discount);
	}
}

class MilkEgg extends DecorateMilkImpl{

	public function __construct(Milk $milk, $discount){
		$this->discount = $discount;
		$this->milk = $milk;
	}
}

class MilkDrink extends DecorateMilkImpl{
	public function __construct(Milk $milk, $discount){
		$this->discount = $discount;
		$this->milk = $milk;
	}
}

function pf($milk){
	echo $milk->getDiscount();
	echo "\n\r";
	echo $milk->getPrice();
	echo "\n\r";
}

echo "\r\nbefore\r\n";
$milk = new Milk();
echo $milk->getPrice();

echo "\r\nafter\r\n";
$mileEgg = new MilkEgg($milk, 0.1);
$mileDrink = new MilkDrink($milk, 0.2);

$egg = new Egg();
$mileEgg->addMilk($egg);

pf($milk);

$drink = new Drink();
$mileDrink->addMilk($drink);

pf($milk);

