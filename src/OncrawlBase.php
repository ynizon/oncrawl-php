<?php

/**
 * Core methods for the Oncrawl API SDK
 *
 * @author Yohann NIzon <ynizon@gmail.com>
 * @version v1 2018-04-06
 * DOC --> http://developer.oncrawl.com
 */

namespace OncrawlPHP;

class OncrawlBase
{
	
	//Pagination settings
	protected $offset = 0;
	protected $limit = 10;
	protected $sort = array();
	protected $filters = null ;
	protected $errors = array() ;
	
	//Segmentation (base filter)
	protected $segmentation = "";
	
	/**
	 * Token
	 */
	protected $access_token;
	
	/**
	 * Public username for oAuth
	 * @var string
	 */
	protected $username;

	/**
	 * password for oAuth
	 * @var string
	 */
	protected $password;

	/**
	 * Zend Timeout
	 * @var int
	 */
	protected $timeout;

	/**
	 * Http status
	 * @var int
	 */
	protected $http_status;

	/**
	 * API Version
	 * @var string
	 */
	protected $api_version = '';

	/**
	 * Url to Searchmetrics API
	 * @var string
	 */
	const SEARCHMETRICS_URL = 'app.oncrawl.com/api/';

	/**
	 * Fill token if you have one, or fill username and password
	 * @param string $username
	 * @param string $password
	 * @param string $token
	 * @param int $timeout
	 */
	public function __construct($username, $password, $token, $timeout = 30)
	{
		$this->username = $username;
		$this->password = $password;
		$this->timeout = $timeout;
		if ($token == ""){
			$this->initToken();
		}else{
			$this->access_token = $token;
		}
		
	}

	/**
	 * Init the Token
	 */
	private function initToken()
	{		
		$url =  'http://'.self::SEARCHMETRICS_URL;
		$url .= $this->getApiVersion();
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,               $url . '/session');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,    true);
		curl_setopt($ch, CURLOPT_HEADER,            false);
		curl_setopt($ch, CURLOPT_POST,              true);		
		curl_setopt($ch, CURLOPT_USERPWD,           $this->username.':'.$this->password);
		$result = curl_exec($ch);
		curl_close($ch);
		 
		$result = json_decode($result, true);
		$this->access_token = $result['session']['token'];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,               $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,    true);
		curl_setopt($ch, CURLOPT_HEADER,            false);
		$result = curl_exec($ch);
		curl_close($ch);
	}

	/**
	 * Executes the API request
	 *
	 * @param $arr_get	 
	 * @param $method
	 * @param $arr_post
	 * @param $bExport (true = for CSV output, false for jSon)
	 * @return result of the api request or string if bExport = true
	 * @throws SDKException
	 */
	protected function run($arr_get, $method, $arr_post = array(), $bExport = false)
	{
		$this->errors = array();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		
		$service_url =  'https://'.self::SEARCHMETRICS_URL;
		$service_url .= $this->getApiVersion();
		
		$headers = array();
		$headers[] = 'x-oncrawl-token: '.$this->access_token;
		$headers[] = 'Content-Type: application/json';

		//curl_setopt($ch, CURLOPT_HEADER,            $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,    true);
		curl_setopt($ch, CURLOPT_HEADER,            false);

		foreach($arr_get as $key) { 
			$service_url .= "/".$key;
		}

		if (strpos($service_url,"?") !== false){
			$service_url.="&";
		}else{
			$service_url.="?";			
		}
		$service_url.= "api_key=".$this->access_token;
		$service_url.= "&offset=".$this->offset;
		$service_url.= "&limit=".$this->limit;
		if (count($this->sort)>0){
			$service_url.= "&sort=".$this->sort;
		}
		if ($this->filters != null){
			//Require "kunststube/rison" package
			$rison = \Kunststube\Rison\rison_encode($this->filters);
			$service_url.= "&filters=".$rison;
		}
		
		
		if ($method == "POST"){
			if ($this->segmentation != ""){
				$arr_post["cr"]=$this->segmentation;
			}			
			$data_string = json_encode($arr_post);
			curl_setopt($ch, CURLOPT_POST,              true);
			curl_setopt($ch,CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Content-Length: ' . strlen($data_string)));
		}
		
		curl_setopt($ch, CURLOPT_URL, $service_url);		
		$result = curl_exec($ch);
		$this->http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		//echo $service_url;
		//echo var_dump($result);
		// response handling
		
		if ($bExport){
			$r = $result;
		}else{
			$r = json_decode($result, true);
			if (isset($r["errors"])){
				$this->errors = $r["errors"];
			}
		}
		
		if ($this->http_status != 200 and $this->http_status != 422)
		{
			return false;
		}
		
		return $r;
		
	}


	/**
	 * Getter API Version
	 *
	 * @return string $this->api_version
	 */
	public function getApiVersion()
	{
		return $this->api_version;
	}

	/**
	 * Setter API Version
	 *
	 * @param string $api_version
	 */
	public function setApiVersion($api_version)
	{
		$this->api_version = $api_version;
	}

	/**
	 * @return int
	 */
	public function getHttpStatus()
	{
		return $this->http_status;
	}
	
	
	/**
	 * Setter offset
	 *
	 * @param string $offset
	 */
	public function setOffset($offset)
	{
		$this->offset = $offset;
	}

	/**
	 * @return int
	 */
	public function getOffset()
	{
		return $this->offset;
	}
	
	/**
	 * Setter limit
	 *
	 * @param string $limit
	 */
	public function setLimit($limit)
	{
		$this->limit = $limit;
	}

	/**
	 * @return int
	 */
	public function getLimit()
	{
		return $this->limit;
	}
	
	/**
	 * Setter sort
	 *
	 * @param string $sort
	 * ex:   name:asc
	 */
	public function setSort($sort)
	{
		$this->sort = $sort;
	}

	/**
	 * @return ""
	 */
	public function getSort()
	{
		return $this->sort;
	}
	
	/**
	 * Setter filters
	 *
	 * @param string $filters
	 */
	public function setFilters($filters)
	{
		$this->filters = $filters;
	}

	/**
	 * @return ""
	 */
	public function getFilters()
	{
		return $this->filters;
	}

	/**
	 * @return array errors
	 */
	public function getErrors()
	{
		return $this->errors;
	}
	
	/*
	* Setter segmentation
	* ex: page_group_default:US
	*/
	public function setSegmentation($s){
		$this->segmentation = $s;
	}
	
	/*
	* Getter segmentation
	*/
	public function getSegmentation(){
		return $this->segmentation;
	}
}

?>
