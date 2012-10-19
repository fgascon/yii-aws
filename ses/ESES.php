<?php

class ESES extends CComponent
{
	
	private $_sdk;
	
	public function __construct()
	{
		$this->_sdk = new AmazonSES();
	}
	
	public function sendEmail($source,$destination,$message,$opt=null)
	{
		$response = $this->_sdk->send_email($source,$destination,$message,$opt);
		return $response->isOk();
	}
}