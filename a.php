<?php
namespace a\aa{
	function show() {
		echo "aa --- show \n";
	}
}
namespace a{
	include "b.php";
	function show() {
		echo "a --- show \n";
	}
	show(); //global 
	\show(); //local
	\a\aa\show();
	aa\show();
	use a\aa as t;
	t\show();
}

namespace c{
	function show(){
		echo "global\n";
	}
}

