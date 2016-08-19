<?php
require_once 'include.php';
$username=$_REQUEST['username'];
$question_id=$_REQUEST['question_id'];
$answer=$_POST['mark'];
$arr=array(
    "username"=>$username,
    "question_id"=>$question_id,
    "answer"=>$answer);

$page=$_REQUEST['page']+1;
$url="index.php?page=".$page;



if(insert("cmet_answer", $arr)){

    echo"<script>window.location='{$url}';</script>";
//     alertMes("答题成功", "index.php?page=".$page);
}else{
     alertMes("系统出错,请联系管理员", "index.php");
    
}
