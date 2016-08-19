<?php
require_once 'include.php';

$act = $_REQUEST['act'];
$id = $_REQUEST['id'];
if($act=="logout"){
    logout();
}elseif ($act=="addUser"){
    $mes=addUser();
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
}
