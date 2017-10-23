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
			$cmd->onCommand($name, $args);
		}

		return $name;
	}
}

class UserCommand implements ICommand
{
	public function onCommand($name, $args){
		if ($name != 'addUser') return null;
		return "addUser";
	}
}

class MailCommand implements ICommand
{
	public function onCommand($name, $args){
		if ($name != 'mail') return null;
		return "mail";
	}
}


