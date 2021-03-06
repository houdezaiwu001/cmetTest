<?php
//require_once '../include.php';
    
/**
 * 检查该管理员是否存在
 * @param string $sql
 * @return multitype:
 */
function checkAdmin($sql){
    return fetchOne($sql);
}

/**
 * 检查该用户是否存在
 * @param string $sql
 * @return multitype:
 */
function checkUser($sql){
    return fetchOne($sql);
}


/**
 * 检查是否已登录
 */
function checkLogined(){
    if(@$_SESSION['adminId']==""&&$_COOKIE['adminId']==""){
        alertMes("请先登录","login.php");
    }
}


/**
 * 检查是否已登录
 */
function checkUserLogined(){
    if(@$_SESSION['userId']==""&&$_COOKIE['userId']==""){
        alertMes("请先登录","login.php");
    }
}


/**
 * 添加管理员操作
 * @return string
 */
function addAdmin(){
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    if(insert("cmet_admin", $arr)){
       $mes="添加成功！<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php' >查看管理员列表</a>"; 
    }else{
       $mes="添加失败!<br/> <a href ='addAdmin.php'>重新添加</a>";
    }
    return $mes;
}


/**
 * 添加用户操作
 * @return string
 */
function addUser(){
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    if($arr['username']!=null&$arr['password']!=null){
        if(insert("cmet_user", $arr)){
        
//             alertMes("注册成功", "login.php");
            return "success";
        }else{
            alertMes("注册失败", "login.php");
            return "fail";
        }
    }else{
        return "fail";
    }
    
    //return $mes;
}



/**
 * 查询全部数据
 * @return multitype:
 */
function getAlladmin(){
    
    $sql="select id,username,email from imooc_admin";
    $rows=fetchAll($sql);
    return $rows;
}


/**
 * 编辑管理员操作
 * @param string $id
 * @return string
 */
function editAdmin($id){
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    if(update("cmet_admin", $arr,"id ={$id}")){
        $mes = "编辑成功<br/><a href = 'listAdmin.php'>查看管理员列表</a>";
        
    }else{
        $mes = "编辑失败！<br/><a href='listAdmin.php'>请重新修改</a>";
    }
    return $mes;
    
}

/**
 * 更新题目操作
 * @param string $id
 * @return string
 */
function changeTest($id){
    $arr = $_POST;
    
    if(update("cmet_question", $arr,"id ={$id}")){
        $mes= "<script type='text/javascript'>alert('修改成功！');location.href='listTest.php'; </script>";

    }else{
        $mes= "<script type='text/javascript'>alert('修改失败！'); </script>";
    }
    return $mes;

}

/**
 * 记录学生做题答案
 */
function marktest(){
    $arr=$_POST;

    if(insert("cmet_answer", $arr)){

        //alertMes("注册成功", "login.php");
    }else{
        // alertMes("注册失败", "login.php");
    }
}


/**
 * 删除管理员操作
 * @param int $id
 * @return string
 */
function delAdmin($id){
    if(delete("cmet_admin","id={$id}")){
        $mes="删除成功<br/><a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="删除失败<br/><a href='listAdmin.php'>请重新删除</a>";
    }
    return $mes;
}


/**
 * 删除试题
 * @param int $id
 * @return string
 */
function delTest($id){
    if(delete("cmet_question","id={$id}")){
 $mes= "<script type='text/javascript'>alert('删除成功！');location.href='listTest.php'; </script>";
    }else{
 $mes= "<script type='text/javascript'>alert('删除失败！');location.href='listTest.php'; </script>";
    }
    return $mes;
}


/**
 * 注销管理员
 */
function logout(){
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['adminId'])){
        setcookie("adminId","",time()-1);
    }
    if(isset($_COOKIE['adminName'])){
        setcookie("adminName","",time()-1);
    }
    session_destroy();
    header("location:login.php");
}


/**
 * 注销用户
 */
function userLogout(){
    $_SESSION = array();
    if(isset($_COOKIE[session_name])){
        setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['userId'])){
        setcookie("userId","",time()-1);
    }
    if(isset($_COOKIE['userName'])){
        setcookie("userName","",time()-1);
    }
    session_destroy();
    header("location:login.php");
}


/**
 * 记录用户开始考试status
 * @return string
 */
function insertStatus(){
    $arr = $_POST;
    if($arr['username']!=null&$arr['status']!=null){
        if(insert("cmet_status", $arr)){

            //             alertMes("注册成功", "login.php");
            return "success";
        }else{
           
            return "fail";
        }
    }else{
        return "fail";
    }

    //return $mes;
}


