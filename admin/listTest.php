<?php
require_once '../include.php';

//echo phpinfo();
$sql = "select * from cmet_question";
$totalRows = getResultNum($sql);
// echo $totalRows;

$pageSize = 2;
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
//$rows = getAllAdmin();
if ($rows == null) {
    alertMes("sorry,没有试题，请先添加", "editTest.php");
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">

<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
   
</head>

<body>
	<div class="details">
		<div class="details_operation clearfix">
			<div class="bui_select">
				<input type="button" value="添&nbsp;&nbsp;加" class="add"
					onclick="addTest()">
			</div>

		</div>
		<!--表格-->
		<table class="table" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th width="5%">编号</th>
					<th width="15%">题目</th>
					<th width="15%">选项一</th>
					<th width="15%">选项二</th>
					<th width="15%">选项三</th>
					<th width="15%">选项四</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
                        <?php  $i=1;foreach($rows as $row):?>
                            <tr>
					<!--这里的id和for里面的c1 需要循环出来  onclick="editTest(<?php echo $row['id'];?>)"-->
					<td><input type="checkbox" id="c1" class="check"><label for="c1"
						class="label"><?php echo $row['id'];?></label></td>
					<td><?php echo $row['question'];?></td>
					<td><?php echo $row['item1'];?></td>
					<td><?php echo $row['item2'];?></td>
					<td><?php echo $row['item3'];?></td>
					<td><?php echo $row['item4'];?></td>
					<td align="center"><button class="btn btn-primary btn-lg" data-toggle="modal" 
   data-target="#myModal" id="<?php echo $row['id'];?>" >
   修改
</button>
<input type="button"
						value="删除" class="btn"
						onclick="delTest(<?php echo $row['id'];?>)">
						
</td>
				</tr>
                            <?php $i++; endforeach;?>
                            <?php if($totalRows>$pageSize):?>
                <tr>
					<td colspan="8"><?php echo showPage($page, $totalPage);?></td>
				</tr>
                            <?php  endif;?>
                        </tbody>
		</table>
		<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               模态框（Modal）标题
            </h4>
         </div>
         <div class="modal-body">
            <form method="post" action="doAdminAction.php?act=change-xz&id=<script>document.getElementById(tbody).rows[0].cells[6].attr("id")</script>"
								class="form-horizontal margin-top-20px" role="form">
								
								<div class="form-group">
									<div class="col-sm-10">
										<input name="question" class="form-control" rows="3"
											value=<?php echo $row['question'];?>>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10">
										<input type="text" name="item1" class="form-control"
											value=<?php echo $row['item1'];?>>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10">
										<input type="text" name="item2" class="form-control"
											value=<?php echo $row['item2'];?>>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10">
										<input type="text" name="item3" class="form-control"
											value=<?php echo $row['item3'];?>>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10">
										<input type="text" name="item4" class="form-control"
											value=<?php echo $row['item4'];?>>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10">
										<label class="radio-inline"> <input type="radio" name="answer"
											value="1" checked=<?php echo "1"== $row['answer']?"checked":"unchecked";?>> 1
										</label> <label class="radio-inline"> <input type="radio"
											name="answer" value="2" checked=<?php echo "2"== $row['answer']?"checked":"unchecked";?>> 2
										</label> <label class="radio-inline"> <input type="radio"
											name="answer" value="3"  checked=<?php echo "3"== $row['answer']?"checked":"unchecked";?>> 3
										</label> <label class="radio-inline"> <input type="radio"
											name="answer" value="4"  checked=<?php echo "4"== $row['answer']?"checked":"unchecked";?>> 4
										</label>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10">
										<button type="submit" class="btn btn-primary">确认修改</button>
									</div>
								</div>
							</form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">关闭
            </button>
            <button type="button" class="btn btn-primary">
               提交更改
            </button>
         </div>
      </div><!-- /.modal-content -->
</div><!-- /.modal -->


	</div>
	<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/base.js"></script>
</body>
<script type="text/javascript">

    function addTest(){ 
    	window.location="editTest.php";
    }
    
	function editTest(id){
		//window.location="editAdmin.php?id="+id;
		alert("")
	}

	function delTest(id){
		if(window.confirm("您确定要删除吗？删除后不可恢复！")){
			window.location="doAdminAction.php?act=delTest&id="+id;
			}
		}

</script>
</html>