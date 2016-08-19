<?php
require_once 'include.php';
checkUserLogined();
// echo phpinfo();
$sql = "select * from cmet_question";
$totalRows = getResultNum($sql);
// echo $totalRows;

$pageSize = 1;
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

?>

<!DOCTYPE html>
<html>
<head><title>在线考试系统--开始考试</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"
	media="screen">
<link rel="stylesheet" type="text/css" href="css/index.css">
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]--></head>
<body>
	<div id="wrapper">
			<div id="header">
	<div class="header-info">
		<img src="images/logo.png" />
		<h3>在线测试系统</h3>
	</div>
</div>
<nav id="navigation">
	<ul>
		<li class="nav-active"><a>考生：
		<?php 
				if(isset($_SESSION['userName'])){
					echo $_SESSION['userName'];
				}elseif(isset($_COOKIE['userName'])){
					echo $_COOKIE['userName'];
				}
            ?>
            </a>
         </li>
         <li><a>考试编号：7d64c675a00afd6faed5da5a188a067b9660a715</a></li>	
    </ul>
</nav>			
<div id="compete-content">
<?php  $i=1;foreach($rows as $row):?>
	<div id="question-panel">
	<div id="question-id">选择：2</div>
	<div id="question-content"><?php echo $row['question'];?></div>
	<div id="question-mark">
	   <p>A：<?php echo $row['item1'];?></p>
	   <p>B：<?php echo $row['item2'];?></p>
	   <p>C：<?php echo $row['item3'];?></p>
	   <p>D：<?php echo $row['item4'];?></p>
	</div><!--#question-mark-->
	<div id="question-select">
	<form method="post" action="compete.php?username=<?php 
				if(isset($_SESSION['userName'])){
					echo $_SESSION['userName'];
				}elseif(isset($_COOKIE['userName'])){
					echo $_COOKIE['userName'];
				}
            ?>&question_id=<?php echo $row['id'];?>&page=<?php echo $page;?>"  id="next-form">
	   <input type="hidden" name="action" value="question" />
	     <label>
	     <input type="radio" name="mark" value="1" class="radio-dot" />
	       <span>&nbsp;&nbsp;A</span>
	     </label>
	     <label>
	     <input type="radio" name="mark" value="2" class="radio-dot" />
	     <span>&nbsp;&nbsp;B</span>
	     </label>
	     <label>
	     <input type="radio" name="mark" value="3" class="radio-dot" />
	     <span>&nbsp;&nbsp;C</span></label>
	     <label><input type="radio" name="mark" value="4" class="radio-dot" />
	     <span>&nbsp;&nbsp;D</span></label>
	     <input type="submit" value="下一题" class="btn btn-primary next-question" />
	 </form>
     <form method="post" action="compete.php?type=0&id=2"  id="skip-form">
       <input type="hidden" name="action" value="skip" />
       <input type="submit" value="跳过" class="btn btn-primary skip-question" />
     </form>
	     </div><!--#question-select--></div>
	     <div class="clear"></div>	
	     <?php $i++; endforeach;?>		
	     </div>
		<div class="clear"></div>
			<div class="clear"></div>
			
			
			<?php if($totalRows>$pageSize):?>
                  <tr>
					<td colspan="8"><?php echo showPage($page, $totalPage);?></td>
				</tr>
            <?php  endif;?>
                            
                            
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/base.js"></script>		</div>
</body>

<script type="text/javascript">

    function addTest(){ 
    	window.location="addTest.php";
    }
    
	function editTest(id){
		window.location="editTest.php?id="+id;

	}

	function delTest(id){
		if(window.confirm("您确定要删除吗？删除后不可恢复！")){
			window.location="doAdminAction.php?act=delTest&id="+id;
			}
		}

</script>
</html>