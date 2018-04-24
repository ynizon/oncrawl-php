# oncrawl-php
For Oncrawl API PHP library v2.
-----------------------------------------------------------

You have 3 files:
OncrawlBase is for call the API, define filter, sort...
OncrawlAPI is the list of functions available with the API (see http://developer.oncrawl.com)
OncrawlCustomAPI is a list of custom functions i need. 

-----------------------------------------------------------
Define your token api or username/password for on crawl on your config/app.php
(prefer the api key)
ONCRAWL_KEY
ONCRAWL_USERNAME
ONCRAWL_PASSWORD


Then, use like this:
use OncrawlPHP\OncrawlBase;
use OncrawlPHP\OncrawlAPI;
use OncrawlPHP\OncrawlCustomAPI;

$api = new OncrawlCustomAPI("","",config("app.ONCRAWL_KEY"));// or
//$api = new OncrawlCustomAPI(config("app.ONCRAWL_USERNAME"),config("app.ONCRAWL_PASSWORD"),"");

//Define segment if you want to filter results
$api->setSegmentation("page_group_default:US");

//Get projects
$json = $api->getProjects();

//Get one project
$json = $api->getProject($project_id);

//Get list of page with status 200
$json = $api->countStatus200($crawl_id);

//Export Data
$fields[] = "title_evaluation";
$fields[] = "h1_evaluation";
$fields[] = "description_evaluation";
$OqlFields[] = array("field"=>array("meta_robots_index","equals","true"));
$OqlFields[] = array("field"=>array("status_code","equals","200"));
$OqlFields[] = array("field"=>array("canonical_evaluation","not_equals","not_matching"));
$OqlFields[] = array("field"=>array("parsed_html","equals","true"));
$s = $api->getExportSEOTags($crawl_id, $fields,$OqlFields);

-----------------------------------------------------------
Contact: ynizon@mail.com