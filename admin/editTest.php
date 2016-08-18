<?php 
require_once '../include.php';
$id = $_REQUEST['id'];
var_dump($id);
$sql ="select question,item1,item2,item3,item4,answer from cmet_question where id ='{$id}'";
$row = fetchOne($sql);
var_dump($sql);
var_dump($row);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>考试系统</title>
<link rel="stylesheet" href="styles/backstage.css">

<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css"
	rel="stylesheet">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

</head>

<body>
	<div class="details">
		<div class="details_operation clearfix">
			<input type="button" value="添&nbsp;&nbsp;加" class="btn btn-primary "
				onclick="addTest()">
		</div>
		<div class="modal-body">

            <h3>编辑题目</h3>
			
			<form method='post' class='form-horizontal margin-top-20px'
				role='form' action="doAdminAction.php?act=change-xz&id=<?php echo $id;?>">



				<div class="form-group">
					<div class="col-sm-10">
						<input name="question" class="form-control" rows="3"
							value="<?php echo $row['question'];?>" id="question">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" name="item1" class="form-control"
							value=<?php echo $row['item1'];?> id='item1'>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" name="item2" class="form-control"
							value=<?php echo $row['item2'];?> id='item2'>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" name="item3" class="form-control"
							value=<?php echo $row['item3'];?> id='item3'>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" name="item4" class="form-control"
							value=<?php echo $row['item4'];?> id='item4'>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="answer"
							value="1"
							<?php if($row['answer']==1) echo "checked='checked'";?>>
							1
						</label> 
						<label class="radio-inline"> <input type="radio"
							name="answer" value="2"
							<?php if($row['answer']==2) echo "checked='checked'";?>>
							2
						</label> 
						<label class="radio-inline"> <input type="radio"
							name="answer" value="3"
							<?php if($row['answer']==3) echo "checked='checked'";?>>
							3
						</label> 
						<label class="radio-inline"> <input type="radio"
							name="answer" value="4"
							<?php if($row['answer']==4) echo "checked='checked'";?>>
							4
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



</body>
<script type="text/javascript">

function addTest(){ 
	window.location="addTest.php";
}

</script>
</html>