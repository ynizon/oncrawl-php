# oncrawl-php
For Oncrawl API PHP library v2.
-----------------------------------------------------------

You have 3 files:<br/>
OncrawlBase is for call the API, define filter, sort...<br/>
OncrawlAPI is the list of functions available with the API (see http://developer.oncrawl.com)<br/>
OncrawlCustomAPI is a list of custom functions i need. <br/>

-----------------------------------------------------------
Define your token api or username/password for on crawl on your config/app.php<br/>
(prefer the api key)<br/>
ONCRAWL_KEY<br/>
ONCRAWL_USERNAME<br/>
ONCRAWL_PASSWORD<br/>
Then, use like this:<br/>
use OncrawlPHP\OncrawlBase;<br/>
use OncrawlPHP\OncrawlAPI;<br/>
use OncrawlPHP\OncrawlCustomAPI;<br/>
<br/>
$api = new OncrawlCustomAPI("","",config("app.ONCRAWL_KEY"));// or<br/>
//$api = new OncrawlCustomAPI(config("app.ONCRAWL_USERNAME"),config("app.ONCRAWL_PASSWORD"),"");<br/>
<br/>
//Define segment if you want to filter results<br/>
$api->setSegmentation("page_group_default:US");<br/>
<br/>
//Get projects<br/>
$json = $api->getProjects();<br/>
<br/>
//Get one project<br/>
$json = $api->getProject($project_id);<br/>
<br/>
//Get list of page with status 200<br/>
$json = $api->countStatus200($crawl_id);<br/>
<br/>
//Export Data<br/>
$fields[] = "title_evaluation";<br/>
$fields[] = "h1_evaluation";<br/>
$fields[] = "description_evaluation";<br/>
$OqlFields[] = array("field"=>array("meta_robots_index","equals","true"));<br/>
$OqlFields[] = array("field"=>array("status_code","equals","200"));<br/>
$OqlFields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));<br/>
$OqlFields[] = array("field"=>array("parsed_html","equals","true"));<br/>
$s = $api->getExportSEOTags($crawl_id, $fields,$OqlFields);<br/>
<br/>
-----------------------------------------------------------
Contact: ynizon@mail.com