<?php

require_once '../include.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
// $verify = $_POST['verify'];
// $verify1 = $_SESSION['verify'];
$autoFlag = $_POST['autoFlag'];

    $sql = "select * from cmet_admin where username = '{$username}' and password = '{$password}'";
    var_dump($sql);
    $row = checkAdmin($sql);
    var_dump($row);
    if($row){
//      如果选了一周内自动登录
        if($autoFlag){
            setcookie("adminId",$row['id'],time()+7*24*3600);
            setcookie("adminName",$row['username'],time()+7*24*3600);
        }
        $_SESSION['adminName'] = $row['username'];
        header("location:index.php");
        $_SESSION['adminId']=$row['id'];
        alertMes("登录成功", "index.php");
    }
    else{
        alertMes("登录失败，重新登录","login.php");
    }
