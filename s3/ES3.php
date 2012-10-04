<?php
/**
* ES3 class file.
*
* @author Frédéric Gascon <frederic.gascon@gmail.com>
* @link https://github.com/fgascon/yii-aws
* @package yii-aws
*/

require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'ES3Bucket.php');

class ES3 extends CComponent
{
	
	private $_sdk;
	private $_buckets = array();
	
	public function __construct()
	{
		$this->_sdk = new AmazonS3();
	}
	
	public function getBucket($bucketName)
	{
		if(isset($this->_buckets[$bucketName]))
			return $this->_buckets[$bucketName];
		else
		{
			$bucket = new ES3Bucket($this->_sdk,$bucketName);
			$this->_buckets[$bucketName] = $bucket;
			return $bucket;
		}
	}
	
	public function createBucket($bucketName,$region,$acl='private',$options=array())
	{
		$this->_sdk->create_bucket($bucketName,$region,$acl,$options);
		return $this->getBucket($bucketName);
	}
	
	public function listBuckets()
	{
		return $this->_sdk->get_bucket_list();
	}
}