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
	
	//Bucket
	
	public function getRegion($options=null)
	{
		return $this->_sdk->get_bucket_region($this->_name,$options);
	}
	
	public function getHeaders($options=null)
	{
		return $this->_sdk->get_bucket_headers($this->_name,$options);
	}
	
	public function getAcl($options=null)
	{
		return $this->_sdk->get_bucket_acl($this->_name,$options);
	}
	
	public function setAcl($acl='private',$options=null)
	{
		return $this->_sdk->get_bucket_acl($this->_name,$acl,$options);
	}
	
	public function delete($force=false,$options=null)
	{
		return $this->_sdk->delete_bucket($this->_name,$force,$options);
	}
	
	public function getObjectCount()
	{
		return $this->_sdk->get_bucket_object_count($this->_name);
	}
	
	public function getFilesize($friendlyFormat=false)
	{
		return $this->_sdk->get_bucket_filesize($this->_name,$friendlyFormat);
	}
	
	public function getObjectList($options=null)
	{
		return $this->_sdk->get_object_list($this->_name,$options);
	}
	
	//Objects
	
	public function createObject($filename,$options=null)
	{
		return $this->_sdk->create_object($this->_name,$filename,$options);
	}
	
	public function getObject($filename,$options=null)
	{
		return $this->_sdk->get_object($this->_name,$filename,$options);
	}
	
	public function getObjectHeaders($filename,$options=null)
	{
		return $this->_sdk->get_object_headers($this->_name,$filename,$options);
	}
	
	public function deleteObject($filename,$options=null)
	{
		return $this->_sdk->delete_object($this->_name,$filename,$options);
	}
	
	public function deleteObjects($options=null)
	{
		return $this->_sdk->delete_objects($this->_name,$options);
	}
	
	public function listObjects($options=null)
	{
		return $this->_sdk->list_objects($this->_name,$options);
	}
	
	public function copyObject($source,$destination,$options=null)
	{
		$sourceArray = array('bucket'=>$this->_name,'filename'=>$source);
		$destinationArray = array('bucket'=>$this->_name,'filename'=>$destination);
		return $this->_sdk->copy_object($sourceArray,$destinationArray,$options);
	}
	
	public function copyObjectToBucket($sourceFile,$destinationBucket,$destinationFile,$options=null)
	{
		$sourceArray = array('bucket'=>$this->_name,'filename'=>$source);
		$destinationArray = array('bucket'=>$destinationBucket->_name,'filename'=>$destinationFile);
		return $this->_sdk->copy_object($sourceArray,$destinationArray,$options);
	}
	
	public function updateObject($filename,$options=null)
	{
		return $this->_sdk->update_object($this->_name,$filename,$options);
	}
	
	public function getObjectAcl($filename,$options=null)
	{
		return $this->_sdk->get_object_acl($this->_name,$filename,$options);
	}
	
	public function setObjectAcl($filename,$acl='private',$options=null)
	{
		return $this->_sdk->set_object_acl($this->_name,$filename,$acl,$options);
	}
	
	public function getObjectFilesize($filename,$friendlyFormat=false)
	{
		return $this->_sdk->get_object_filesize($this->_name,$filename,$friendlyFormat);
	}
	
	public function setObjectContentType($filename,$contentType,$options=null)
	{
		return $this->_sdk->change_content_type($this->_name,$filename,$contentType,$options);
	}
	
	public function setObjectReundancy($filename,$storage,$options=null)
	{
		return $this->_sdk->change_storage_redundancy($this->_name,$filename,$storage,$options);
	}
	
	public function getObjectUrl($filename,$preauth=0,$options=null)
	{
		return $this->_sdk->get_object_url($this->_name,$filename,$preauth,$options);
	}
	
	public function objectExists($filename)
	{
		return $this->_sdk->if_object_exists($this->_name,$filename);
	}
	
	public function generateUploadParameters($expires='+1 hour',$options=null)
	{
		return $this->_sdk->generate_upload_parameters($this->_name,$expires,$options);
	}
}