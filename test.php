<?php
include "t.php";
##---------------------------------------------
##-----测试用例--------------------------------
##---------------------------------------------
class Test{
	static private $_entry = array(); //测试模块
	static private $_module; //测试模式数量
	static private $_error;

	static private function _start(){
		echo "test is starting...\n";
	}

	static function start(){
		self::_start();
	}

	static function doTest(){
		foreach(self::$_entry as $mod){
			$mod = Ucfirst($mod);
			$func = "test$mod";
			call_user_func("self::$func");
		}
	}

	static function end(){
		self::_end();
	}

	static function add($mod){
		if (!in_array($mod, self::$_entry)){
			self::$_entry[] = $mod;
			++self::$_module;
		}
	}

	static private function _end(){
		echo "test is ending...\n";
	}

	//已加载测试用例模块数
	static function showModule(){
		return self::$_module;
	}

	//已加载测试用例模块
	static function showEntry(){
		return self::$_entry;
	}

	static private function testDecorate(){
		$comp = new ConcreteComponent; 
		$deco = new ConcreteDecorateA($comp); //装饰类
		$t = $deco->operation();

		assert_options(ASSERT_ACTIVE, 1);
		assert_options(ASSERT_WARNING, 0);
		assert_options(ASSERT_QUIET_EVAL, 1);
		assert_options(ASSERT_CALLBACK, 'assert_handler');
		assert("2 === 1");

		$deco->addDecorateOperationA();

		$deco2 = new ConcreteDecorateB($comp); //装饰类
		$deco2->operation();
		$deco2->addDecorateOperationB();
	}

	static private function testAdaptee(){
		$a = new A;
		$b = new B;

		$ex = new Adaptee($a, $b);
		$ex->hello_a_b();
	}
}

function assert_handler($file, $line, $code) {
	$re = <<<EOT
	\nAssertion Failed:\n
	File $file \n
	Line $line \n
	Code $code\n;
EOT;
	echo $re;
}

Test::start();
Test::add('Decorate');
Test::add('Adaptee');
Test::doTest();
Test::end();
