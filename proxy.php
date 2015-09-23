<?php
#proxy ?????????
interface Proxy{
	function request();
}

class Real implements Proxy{
	public function __construct(){

	}

	public function request(){
		echo "haha....\n";
	}
}

class Proxy_Real{
	private $_real;
	public function __construct($real){
		$this->_real = $real;
	}

	public function request(){
		$this->_real->request();
	}
}

$real = new Real;
$pro_real = new Proxy_real($real);
$pro_real->request();

