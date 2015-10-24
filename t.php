<?php
class B 
{
	public function show()
	{
		echo "do something\n";
	}

	protected function doparent()
	{
		echo "do something\n";
	}
}

class C extends B
{
	public function show()
	{
		parent::show();
		echo "do other things..\n";
	}

	public function do_other()
	{
		$this->doparent();
		echo "do other things..\n";
	}
}

$c = new C;
$c->do_other();

