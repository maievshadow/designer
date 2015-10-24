<?php
interface Aproxy
{
	function get_response();
	function do_request();
}

//request proxy
class Request_proxy implements Aproxy
{
	private $_request;
	public function __construct()
	{
		$this->_request = new Request;
	}

	public function do_request()
	{
		$this->_request->start();
	}
	
	public function get_response()
	{
		$this->_request->response();
	}
}

//request
class Request
{
	public function __construct()
	{
		$this->_response = new Response();
	}

	public function start()
	{
		echo "request is starting..\n";
	}

	public function response()
	{
		$this->_response->do_response();
	}

	private $_response;
}

//response
class Response
{
	public function do_response()
	{
		echo "response is starting..\n";
		echo 'is ending...\n';
	}
}

//client 
class Client
{
	public function __construct($proxy)
	{
		$this->_proxy = $proxy;
	}

	public function do_request()
	{
		$this->_proxy->do_request();
	}

	public function get_response()
	{
		$this->_proxy->get_response();
	}

	private $_proxy;
}

$client = new Client(new Request_proxy);
$client->do_request();
$client->get_response();
