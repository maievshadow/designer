<?php
class Apple
{
	public function __construct()
	{
		echo "apple\n";
	}

	public function eat()
	{
		echo "apple is eated..\n";
	}
}

class Orange
{
	public function __construct()
	{
		echo "orange\n";
	}

	public function eat()
	{
		echo "orange is eated..\n";
	}
}

class Factory
{
	static private $_instance = null;
	static private $_fruit = null;

	private function __construct()
	{
		self::$_fruit[] = new Apple;
		self::$_fruit[] = new Orange;
	}

	static public function create()
	{
		if (!self::$_instance) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	static function eat_all()
	{
		foreach(self::$_fruit as $fruit) {
			$fruit->eat();
		}
	}
}

$fruit_factory = Factory::create();
$fruit_factory->eat_all();
