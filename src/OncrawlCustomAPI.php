<?php
namespace OncrawlPHP;


/**
 * Oncrawl API SDK Class With Custom Query
 * You can find basic queries on onCrawlAPI
 * Here, you have custom queries for getting some informations with custom settings (for my projects)...
 * 
 * @author generated
 * @author Yohann Nizon <ynizon@gmail.com>
 * DOC --> http://developer.oncrawl.com 
 * @version 2018-04-11 11:10
 */
class OncrawlCustomAPI extends OncrawlAPI
{
	/* 
	count total crawled pages 
	*/
	public function countPagesCrawled($crawl_id)
	{
		$aggs = array("aggs"=>array(array("oql"=>array("field"=>array("fetched","equals","true")))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	count total pages 
	*/
	public function countPages($crawl_id)
	{
		$aggs = array("aggs"=>array(array("oql"=>array("field"=>array("depth","has_value","")))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	get average load time 
	*/
	public function getAverageLoadTime($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$aggs = array("aggs"=>array(array("value"=>"load_time:avg","oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	load time = perfect
	*/
	public function countLoadTimePerfect($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("load_time_range","equals","perfect"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	load time = medium
	*/
	public function countLoadTimeMedium($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("load_time_range","equals","medium"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	load time = slow
	*/
	public function countLoadTimeSlow($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("load_time_range","equals","slow"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	load time = too_slow
	*/
	public function countLoadTimeTooSlow($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("load_time_range","equals","too_slow"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	
	/* 
	word_count_range = Cxs (< 150 words)
	*/
	public function countWordCountRangeXs($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("word_count_range","equals","xs"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	word_count_range = s  (150 - 300 words)
	*/
	public function countWordCountRangeS($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));		
		$fields[] = array("field"=>array("word_count_range","equals","s"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	word_count_range = m  (300 - 500 words)
	*/
	public function countWordCountRangeM($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("word_count_range","equals","m"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	word_count_range = l  (500 - 800 words)
	*/
	public function countWordCountRangeL($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("word_count_range","equals","l"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	word_count_range = xl  (800 - 1200 words)
	*/
	public function countWordCountRangeXL($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("word_count_range","equals","xl"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	word_count_range = xxl  (> 1200 words)
	*/
	public function countWordCountRangeXXL($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("word_count_range","equals","xxl"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	count unique title
	*/
	public function countTitleUnique($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("title_evaluation","equals","unique"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	count not set title
	*/
	public function countTitleNotSet($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("title_evaluation","equals","not_set"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	count duplicated title
	*/
	public function countTitleDuplicated($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("title_evaluation","equals","duplicated"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
		
	/* 
	count unique Description
	*/
	public function countDescriptionUnique($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("description_evaluation","equals","unique"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	count not set Description
	*/
	public function countDescriptionNotSet($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("description_evaluation","equals","not_set"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	count duplicated Description
	*/
	public function countDescriptionDuplicated($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("description_evaluation","equals","duplicated"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	count unique h1
	*/
	public function countH1Unique($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("h1_evaluation","equals","unique"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	count not set h1
	*/
	public function countH1NotSet($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("h1_evaluation","equals","not_set"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	count duplicated h1
	*/
	public function countH1Duplicated($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("meta_robots_index","equals","true"));
		$fields[] = array("field"=>array("status_code","equals","200"));
		$fields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$fields[] = array("field"=>array("parsed_html","equals","true"));
		$fields[] = array("field"=>array("h1_evaluation","equals","duplicated"));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	count status = 200
	*/
	public function countStatus200($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("status_code_range","equals","ok"));
		$fields[] = array("field"=>array("depth","has_value",""));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	count status = 3XX
	*/
	public function countStatus300($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("status_code_range","equals","redirect"));
		$fields[] = array("field"=>array("depth","has_value",""));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	count status = 4XX
	*/
	public function countStatus400($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("status_code_range","equals","client_error"));
		$fields[] = array("field"=>array("depth","has_value",""));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/* 
	count status = 5XX
	*/
	public function countStatus500($crawl_id)
	{
		$fields = array();
		$fields[] = array("field"=>array("status_code_range","equals","server_error"));
		$fields[] = array("field"=>array("depth","has_value",""));
		$aggs = array("aggs"=>array(array("oql"=>array("and"=>$fields))));
		
		$jsonResponse = $this->getCrawlAggegateQuery($crawl_id, "pages", $aggs);
		$r = $this->getValueFromAggregateQuery($jsonResponse);
		
		return $r;
	}
	
	/*
	get export
	*/
	public function getExportSEOTags($crawl_id, $fields,$OqlFields){
		/*
		$OqlFields = array();
		$OqlFields[] = array("field"=>array("meta_robots_index","equals","true"));
		$OqlFields[] = array("field"=>array("status_code","equals","200"));
		$OqlFields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
		$OqlFields[] = array("field"=>array("parsed_html","equals","true"));
		$OqlFields[] = array("field"=>array("h1_evaluation","equals","not_set"));
		*/
		$arrOqlFields = array("and"=>$OqlFields);
		return $this->getExport($crawl_id, $fields ,$arrOqlFields);
	}	
	
	/*
		get a value from agg Query
	*/
	private function getValueFromAggregateQuery($jsonResponse){
		$r = "";
		if (isset($jsonResponse["aggs"])){
			if (isset($jsonResponse["aggs"][0])){
				if (isset($jsonResponse["aggs"][0]["rows"])){
					if (isset($jsonResponse["aggs"][0]["rows"][0])){
						if (isset($jsonResponse["aggs"][0]["rows"][0][0])){
							$r = $jsonResponse["aggs"][0]["rows"][0][0];
						}
					}
				}
			}
		}
		return $r;
	}
}

?>