<?php
/**
* ES3Bucket class file.
*
* @author Frédéric Gascon <frederic.gascon@gmail.com>
* @link https://github.com/fgascon/yii-aws
* @package yii-aws
*/

class ES3Bucket extends CComponent
{
	
	private $_sdk;
	private $_name;
	
	public function __construct($sdk,$name)
	{
		$this->_sdk = $sdk;
		$this->_name = $name;
	}
	
	public function createObject($filename,$options=null)
	{
		return $this->_sdk->create_object($this->_name,$filename,$options);
	}
	
	public function getObjectUrl($filename,$preauth=0,$options=null)
	{
		return $this->_sdk->get_object_url($this->_name,$filename,$preauth,$options);
	}
	
	public function deleteObject($filename,$options=null)
	{
		return $this->_sdk->delete_object($this->_name,$filename);
	}
}