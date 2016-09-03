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








$act = $_REQUEST['act'];
$id = $_REQUEST['id'];


if($act=="logout"){
    userLogout();
}elseif ($act=="addUser"){
    $mes=addUser();
}elseif ($act=="login"){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "select * from cmet_user where username = '{$username}' and password = '{$password}'";
    $row = checkUser($sql);
    if($row){
        $mes="success";
    }
    else{
        $mes="fail";
    }
}elseif ($act=="editAdmin"){
    $mes = editAdmin($id);
}elseif ($act=="delAdmin"){
    $mes = delAdmin($id);
}elseif($act=="addCate"){
    $mes = addCate();
}elseif($mes=="editCate"){
    $where="id={$id}";
    $mes=editCate($where);
}elseif($mes=="delCate"){
    $where="id={$id}";
    $mes=delCate($where);
}elseif ($_POST['action']=='add-xz'){
    
    include ROOT_PATH.'lib/add-question.func.php';
    $_add_xz=array();
    $_add_xz['content']=_check_content($_POST['content']);
    $_add_xz['mark_a']=_check_content($_POST['mark_a']);
    $_add_xz['mark_b']=_check_content($_POST['mark_b']);
    $_add_xz['mark_c']=_check_content($_POST['mark_c']);
    $_add_xz['mark_d']=_check_content($_POST['mark_d']);
    $_add_xz['answer']=$_POST['answer'];
    _query("INSERT INTO cmet_question(
        question,
        cId,
        item1,
        item2,
        item3,
        item4,
        answer
    ) VALUES(
        '{$_add_xz['content']}',
        0,
        '{$_add_xz['mark_a']}',
        '{$_add_xz['mark_b']}',
        '{$_add_xz['mark_c']}',
        '{$_add_xz['mark_d']}',
        '{$_add_xz['answer']}'
    )");
    if (mysql_affected_rows()==1) {
        _sql_close();
        $mes= "<script type='text/javascript'>alert('添加成功！');location.href='listTest.php'; </script>";
    }else{
        _sql_close();
        $mes= "<script type='text/javascript'>alert('添加失败！');location.href='listTest.php'; </script>";
        
    }
}elseif ($act=='change-xz'){

    $mes = changeTest($id);

}elseif ($act=="delTest"){
    $mes = delTest($id);
}elseif ($act=="startTest"){
    
    $username=$_POST['username'];
    $status=$_POST['status'];
    $sql = "select * from cmet_status where username='{$username}'";
    $sql_update="update cmet_status set status='{$status}' where username='{$username}'";
    
    if (getResultNum($sql)) {
        if (mysql_query($sql_update)) {
            echo "<script>window.location='{$url}';</script>";
        } 
    } else {
   
        $mes = insertStatus();
    }
    
}elseif ($act=="completeTest"){
    
    $username=$_POST['username'];
    $status=$_POST['status'];
    $sql = "select * from cmet_status where username='{$username}'";
    $sql_update="update cmet_status set status='{$status}' where username='{$username}'";
    
    if (getResultNum($sql)) {
        if (mysql_query($sql_update)) {
            echo "<script>window.location='{$url}';</script>";
        } 
    } else {
   
        $mes = insertStatus();
    }
    
}

$arr=array('responseCode'=>$mes);
echo json_encode($arr);