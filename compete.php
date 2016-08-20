<?php
require_once 'include.php';
$username = $_REQUEST['username'];
$question_id = $_REQUEST['question_id'];
$answer = $_POST['mark'];
$arr = array(
    "username" => $username,
    "question_id" => $question_id,
    "answer" => $answer
);

$page = $_REQUEST['page'] + 1;
$url = "index.php?page=" . $page;
$sql = "select * from cmet_answer where username='{$username}' and question_id='{$question_id}'";
// var_dump($sql);
// var_dump(getResultNum($sql));

//问题描述：用户点击下一题提交的时候，每次提交都会插入一条答案数据，同一条题目也会插入多条答案，答案为空的时候也会插入一条记录
//解决办法：当用户点击提交时，先对客户端传入的答案数据进行判断是否为空，若为空，则不插入数据；
//       若不为空，再对数据库查询该用户先前是否有答此题的记录，若有，则调用update语句,若无，则调用插入语句，则可解决此矛盾。

$sql_update="update cmet_answer set answer='{$answer}' where username='{$username}' and question_id='{$question_id}'";
if ($answer != null) {
    if (getResultNum($sql)) {
        if (mysql_query($sql_update)) {
            echo "<script>window.location='{$url}';</script>";
        } else {
            alertMes("系统出错,请联系管理员", "index.php");
        }
    } else {
        
        if (insert("cmet_answer", $arr)) {
            
            echo "<script>window.location='{$url}';</script>";
            // alertMes("答题成功", "index.php?page=".$page);
        } else {
            alertMes("系统出错,请联系管理员", "index.php");
        }
    }
}else{
       echo "<script>window.location='{$url}';</script>";
}
