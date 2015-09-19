<?php
class DatabaseConnection
{
	public static function get(){
		static $db = null;
		if ($db == null)
			$db = new DatabaseConnection();
		return $db;
	}

	private $_handle = null;

	private function __construct(){
		$dsn = '';
		$this->_handle = DB::Connect($dsn, array());
	}

	public function handle(){
		return $this->_handle;
	}
}

print DatabaseConnection::get()->handle();
