<?php 
require_once '../include.php';
checkLogined();
?>

<!doctype html>
<html>
<meta charset="utf-8">
<body>

<div class="link fr">
            <b>欢迎您
            <?php 
				if(isset($_SESSION['adminName'])){
					echo $_SESSION['adminName'];
				}elseif(isset($_COOKIE['adminName'])){
					echo $_COOKIE['adminName'];
				}
            ?>
            
            </b>&nbsp;&nbsp;<a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
</div>
        
        
<ul>
    <li><a href="addAdmin.php">添加管理员</a></li>
	<li><a href="listAdmin.php">查看管理员</a></li>
</ul>

<ul>
	<li><a href="addTest.php">设计问卷</a></li>
	<li><a href="listTest.php">查看问卷</a></li>
</ul>

</body>
</html>