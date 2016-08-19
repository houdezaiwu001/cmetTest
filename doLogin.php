<?php

require_once 'include.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
// $verify = $_POST['verify'];
// $verify1 = $_SESSION['verify'];
$autoFlag = $_POST['autoFlag'];

    $sql = "select * from cmet_user where username = '{$username}' and password = '{$password}'";
    var_dump($sql);
    $row = checkUser($sql);
    var_dump($row);
    if($row){
//      如果选了一周内自动登录
        if($autoFlag){
            setcookie("userId",$row['id'],time()+7*24*3600);
            setcookie("userName",$row['username'],time()+7*24*3600);
        }
        $_SESSION['userName'] = $row['username'];
        header("location:index.php");
        $_SESSION['userId']=$row['id'];
        alertMes("登录成功", "index.php");
    }
    else{
        alertMes("登录失败，重新登录","login.php");
    }
