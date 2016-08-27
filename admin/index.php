<?php 
require_once '../include.php';
checkLogined();
?>

<!doctype html>
<html>

<head>
<title>后台管理</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"
	media="screen">
<link rel="stylesheet" type="text/css" href="css/index.css">
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>


<body style="background-color: white">

<div class="link fr">
            <b style="position:relative;left:15px">欢迎您,
            <?php 
				if(isset($_SESSION['adminName'])){
					echo $_SESSION['adminName'];
				}elseif(isset($_COOKIE['adminName'])){
					echo $_COOKIE['adminName'];
				}
            ?>
            
            </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
</div>
 
<div class="page-header">
        <h3 style="position:relative;left:55px">操作模块</h3>        
      
          <div class="list-group" style="align:center">       
                <ul>
                    <li class="list-group-item"><a href="addAdmin.php" style="color:#5599FF" >添加管理员</a></li>
                	<li class="list-group-item"><a href="listAdmin.php" style="color:#5599FF">查看管理员</a></li>
                </ul>
                
                <ul>
                	<li class="list-group-item"><a href="addTest.php" style="color:#5599FF">设计问卷</a></li>
                	<li class="list-group-item"><a href="listTest.php" style="color:#5599FF">查看问卷</a></li>
                </ul>
          </div>
</div>

      
      
</body>
</html>