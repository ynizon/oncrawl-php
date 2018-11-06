<?php
namespace OncrawlPHP;


/**
 * Oncrawl API SDK Class
 * 
 * @author generated
 * @author Yohann Nizon <ynizon@gmail.com>
 * DOC --> http://developer.oncrawl.com 
 * @version 2018-05-11 11:10
 */
class OncrawlAPI extends OncrawlBase
{
	/**
	 * API Version
	 */
	protected $api_version = 'v2';

	/*
	List project
	*/
	public function getProjects()
	{
		return $this->run(array("projects"), 'GET', array() );
	}
	
	/*
	List crawl of a project
	*/
	public function getProject($project_id)
	{
		return $this->run(array("projects",$project_id), 'GET');
	}
	
	/*
	Add a project
	*/
	public function addProject($project_name, $start_url)
	{
		return $this->run(array("projects"),'POST', array("project"=>array("name"=>$project_name,"start_url"=>$start_url)));
	}
	
	/*
	Delete a project
	*/
	public function deleteProject($project_id)
	{
		return $this->run(array("projects",$project_id),'DELETE');
	}
		
	/*
	Start a crawl
	Before this, you need to validate crawl config
	*/
	public function launchCrawlProject($project_id, $config_id)
	{
		return $this->run(array("projects",$project_id,"launch_crawl?configId=".$config_id), 'POST');
	}
	
	/*
	Get Scheduled crawls
	*/
	public function getScheduledCrawlProject($project_id)
	{
		return $this->run(array("projects",$project_id,"scheduled_crawls"), 'GET');
	}
	
	/*
	Schedule a crawl 
	Before this, you need to validate crawl config
	*/
	public function addScheduleCrawlProject($project_id, $scheduled_crawl)
	{
		return $this->run(array("projects",$project_id,"scheduled_crawls"), 'POST', $scheduled_crawl);
	}
	
	/*
	Delete a Scheduled crawl 
	Before this, you need to validate crawl config
	*/
	public function deleteScheduleCrawlProject($project_id, $scheduled_crawl_id)
	{
		return $this->run(array("projects",$project_id,"scheduled_crawls",$scheduled_crawl_id), 'DELETE');
	}
		
	/*
	Get crawls
	*/
	public function getCrawls()
	{
		return $this->run(array("crawls"), 'GET');
	}
	
	/*
	Get a crawl
	*/
	public function getCrawl($crawl_id)
	{
		return $this->run(array("crawls",$crawl_id), 'GET');
	}
	
	/*
	Get a crawl progress
	*/
	public function getCrawlProgress($crawl_id)
	{
		return $this->run(array("crawls",$crawl_id,"progress"), 'GET');
	}
	
	/*
	UPdate a crawl state
	*/
	public function updateCrawlState($crawl_id, $state)
	{
		return $this->run(array("crawls",$crawl_id,"pilot"), 'POST', array("command"=>$state));
	}
	
	/*
	Delete a crawl 
	*/
	public function deleteCrawl($crawl_id)
	{
		return $this->run(array("crawls",$crawl_id), 'DELETE');
	}

	/*
	Get crawl configs settings
	*/
	public function getProjectCrawlsConfig($project_id)
	{
		return $this->run(array("projects",$project_id,"crawl_configs"), 'GET');
	}
	
	/*
	Get crawl config settings
	*/
	public function getProjectCrawlConfig($project_id, $config_id)
	{
		return $this->run(array("projects",$project_id,"crawl_configs",$config_id), 'GET');
	}

	/*
	Validate the crawl config
	*/
	public function validateProjectCrawlConfig($project_id, $crawl_config)
	{
		return $this->run(array("projects",$project_id,"crawl_configs","validate"), 'POST', $crawl_config);
	}
	
	/*
	Add a new crawl config
	* $crawl_config = array("crawl_config"=>array("name","start_url","user_agent","max_speed"))
	*/
	public function addProjectCrawlConfig($project_id, $crawl_config)
	{
		return $this->run(array("projects",$project_id,"crawl_configs"), 'POST', $crawl_config);
	}
	
	/*
	UPdate a crawl config
	*/
	public function updateProjectCrawlConfig($project_id, $crawl_config_id, $crawl_config)
	{
		return $this->run(array("projects",$project_id,"crawl_configs",$crawl_config_id), 'PUT', $crawl_config);
	}
	
	/*
	Delete a crawl config
	*/
	public function deleteProjectCrawlConfig($project_id, $config_id)
	{
		return $this->run(array("projects",$project_id,"crawl_configs",$config_id), 'DELETE');
	}
	
	
	
	
	
	/*
	DataSchema
	data_type :
		- pages
		- links
		- crawl_over_crawls
	*/
	public function getCrawlDataSchema($crawl_id, $data_type)
	{
		return $this->run(array("data","crawl",$crawl_id,$data_type,"fields"), 'GET');
	}
	
	/*
	DataSchema
	data_type :
		- pages
		- links
		- crawl_over_crawls
	*/
	public function getLogMonitorDataSchema($project_id, $data_type)
	{
		return $this->run(array("data","projects",$project_id,"log_monitoring", $data_type,"fields"),  'GET');
	}
	
	/*
	DataSchema
	data_type :
		- pages
		- links
		- crawl_over_crawls
	*/
	public function getCrawlOverCrawlDataSchema($coc_id, $data_type)
	{
		return $this->run(array("data","crawl_over_crawl",$coc_id,$data_type,"fields"),  'GET');
	}
	
	
	/*
	Aggregations Request
	data_type :
		- pages
		- links
		- crawl_over_crawls
	*/
	public function getCrawlAggegateQuery($crawl_id, $data_type, $aggs)
	{
		return $this->run(array("data","crawl",$crawl_id,$data_type,"aggs"), 'POST',$aggs);
	}
	
	/*
	Aggregations Request
	data_type :
		- pages
		- links
		- crawl_over_crawls
	*/
	public function getLogMonitorAggegateQuery($project_id,$data_type,$aggs)
	{
		return $this->run(array("data","projects",$project_id,"log_monitoring",$data_type,"aggs"),  'POST',$aggs);
	}
	
	/*
	Aggregations Request
	data_type :
		- pages
		- links
		- crawl_over_crawls
	*/
	public function getCrawlOverCrawlAggegateQuery($coc_id, $data_type,$aggs)
	{
		return $this->run(array("data","crawl_over_crawl",$coc_id,$data_type,"aggs"),  'POST',$aggs);
	}
	
	/*
	Search Query
	data_type :
		- pages
		- links
		- crawl_over_crawls
	*/
	public function getCrawlDatatypeSearchQuery($crawl_id, $data_type)
	{
		return $this->run(array("data","crawl",$crawl_id,$data_type), 'GET');
	}
	
	/*
	Search Query
	data_type :
		- pages
		- links
		- crawl_over_crawls
	*/
	public function getLogMonitorSearchQuery($project_id,$data_type)
	{
		return $this->run(array("data","projects",$project_id,"log_monitoring",$data_type),  'GET');
	}
	
	/*
	Search Query
	data_type :
		- pages
		- links
		- crawl_over_crawls
	*/
	public function getCrawlOverCrawlSearchQuery($coc_id, $data_type)
	{
		return $this->run(array("data","crawl_over_crawl",$coc_id,$data_type),  'GET');
	}
	
	/*
	get Page Groupe Lists (segmentation)
	*/
	public function getPageGroupLists($project_id)
	{
		return $this->run(array("projects",$project_id,"page_group_lists?with_groups=true"),  'GET');
	}
	
	
	/*
	Export query
	* Doc : http://developer.oncrawl.com/#Export-Queries
	*/
	public function getExport($crawl_id, $arrFields = array("url"),$arrOqlFields)
	{
		$aggs = array("export"=>true,"fields"=>$arrFields, "oql"=>$arrOqlFields);
		return $this->run(array("data","crawl",$crawl_id,"pages"), 'POST', $aggs,true);
	}
	
	/*
	Export query
	fields and query need to be urlencoded
	*/
	public function getFieldsAndQuery($crawl_id, $fields,$query)
	{
		return $this->run(array("crawls",$crawl_id,"export",$this->access_token."?fields=".json_encode($fields)."&oql=".json_encode($query)), 'GET');
	}
	
	/* 
	get availables fields for a crawl
	*/
	public function getFields($crawl_id)
	{
		return $this->run(array("crawls",$crawl_id,"querybuilder","fields"), 'GET');
	}
}

?>