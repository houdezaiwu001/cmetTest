<?php
require_once 'include.php';
checkUserLogined();
// echo phpinfo();
$sql = "select * from cmet_question";
$totalRows = getResultNum($sql);
// echo $totalRows;

$pageSize = 2
;
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
foreach ($rows as $row){
    echo json_encode($row);
}




//     $array=array('title'=>'name','value'=>'dog');
//     echo json_encode($array);