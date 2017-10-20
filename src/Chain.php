<?php
interface ICommand
{
	function onCommand($name, $args);
}

class CommandChain
{
	private $_commands = array();

	public function addCommand($cmd){
		$this->_commands[] = $cmd;
	}

	public function runCommand($name, $args){
		foreach($this->_commands as $cmd) {
			if ($cmd->onCommand($name, $args))
				return;
		}
	}
}

class UserCommand implements ICommand
{
	public function onCommand($name, $args){
		if ($name != 'addUser') return false;
		echo "UserCommand handling 'addUser'\n";
		return true;
	}
}

class MailCommand implements ICommand
{
	public function onCommand($name, $args){
		if ($name != 'mail') return false;
		echo "MailCommand handling 'mail'\n";
		return true;
	}
}


