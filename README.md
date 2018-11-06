# oncrawl-php
For Oncrawl API PHP library v2.

You have 3 files:<br/>
OncrawlBase is for call the API, define filter, sort...<br/>
OncrawlAPI is the list of functions available with the API (see http://developer.oncrawl.com)<br/>
OncrawlCustomAPI is a list of custom functions i need. <br/>

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
$api = new OncrawlCustomAPI("","",config("app.ONCRAWL_KEY"));// or
//$api = new OncrawlCustomAPI(config("app.ONCRAWL_USERNAME"),config("app.ONCRAWL_PASSWORD"),"");

//Define segment if you want to filter results<br/>
$api->setSegmentation("page_group_default:US");

//Get projects
$json = $api->getProjects();

//Get one project
$json = $api->getProject($project_id);

//Get list of page with status 200
$json = $api->countStatus200($crawl_id);

//Export Data<br/>
$fields[] = "title_evaluation";
$fields[] = "h1_evaluation";
$fields[] = "description_evaluation";
$OqlFields[] = array("field"=>array("meta_robots_index","equals","true"));
$OqlFields[] = array("field"=>array("status_code","equals","200"));
$OqlFields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
$OqlFields[] = array("field"=>array("parsed_html","equals","true"));
$s = $api->getExportSEOTags($crawl_id, $fields,$OqlFields);
<br/>

Contact: ynizon@mail.com
