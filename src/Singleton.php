<?php
class A
{
	private function __construct()
	{
		self::$_db = 1;
	}

	static private $_db;
	static private $_instance = null;

	static public function run()
	{
		if (is_null(self::$_instance)){
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	static function db()
	{
		return self::$_db;
	}
}

$a1 = A::run();
$a2 = A::run();
var_dump($a1 == $a2);
var_dump($a1 === $a2);
var_dump($a1, $a2);
var_dump($a1->db());
