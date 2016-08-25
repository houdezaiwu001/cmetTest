<?php
header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
session_start();
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once 'mysql.func.php';

require_once 'common.func.php';
require_once 'string.func.php';
require_once 'page.func.php';
require_once "configs.php";
require_once 'admin.inc.php';

require_once 'cate.inc.php';
require_once 'upload.func.php';
require_once 'add-question.func.php';
connect();



//checkUserLogined();
// echo phpinfo();
$sql = "select * from cmet_question";
$totalRows = getResultNum($sql);
// echo $totalRows;

$pageSize = $totalRows;
$totalPage = ceil($totalRows / $pageSize);

$page = $_REQUEST['page'] ? (int) $_REQUEST['page'] : 1;

if ($page < 1 || $page == null || ! is_numeric($page)) {
    $page = 1;
}
if ($page >= $totalPage) {
    $page = $totalPage;
}

$offset = ($page - 1) * $pageSize;

$sql = "select id,question,item1,item2,item3,item4 from cmet_question limit {$offset},{$pageSize}";

$rows = fetchAll($sql);
// $rows = getAllAdmin();
if ($rows == null) {
    alertMes("sorry,没有试题，请先添加", "editTest.php");
}
// header('Content-type:text/json');

class JsonObject{
    var $json;
    public function getJson(){
        return $this->json;
    }
    public function setJson($name){
        $this->$json=$name;
    }
}
// $ArrayList = array();

// foreach ($rows as $row){
    
//     array_push($ArrayList, urlencode(json_encode($row))); 
// }

$jsonString = new JsonObject();
$jsonString->json=$rows;

echo json_encode($jsonString);




//     $array=array('title'=>'name','value'=>'dog');
//     echo json_encode($array);