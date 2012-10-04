<?php
/**
* EAWS class file.
*
* @author Frédéric Gascon <frederic.gascon@gmail.com>
* @link https://github.com/fgascon/yii-aws
* @package yii-aws
*/

class EAWS extends CApplicationComponent
{
	const AWSSDK_VERSION = '1.5.15';
	
	public $accessKey;
	public $secretKey;
	public $cacheConfig = '';
	public $certificateAuthority = false;
	
	public function init()
	{
		require_once($this->getSdkPath().DIRECTORY_SEPARATOR.'sdk.class.php');
		Yii::registerAutoloader(array('CFLoader','autoloader'));
		CFCredentials::set(array(
			'@default'=>array(
				'key'=>$this->accessKey,
				'secret'=>$this->secretKey,
				'default_cache_config'=>$this->cacheConfig,
				'certificate_authority'=>$this->certificateAuthority,
			),
		));
	}
	
	private function getSdkPath()
	{
		return VENDORS_PATH.DIRECTORY_SEPARATOR.'awssdk_'.self::AWSSDK_VERSION;
	}
	
	private $_s3;
	public function getS3()
	{
		if($this->_s3===null)
		{
			require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'s3'.DIRECTORY_SEPARATOR.'ES3.php');
			$this->_s3 = new ES3();
		}
		return $this->_s3;
	}
}