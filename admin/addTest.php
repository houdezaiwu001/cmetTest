<?php
if ($_POST['action'] == 'add-pd') {
    include ROOT_PATH . 'includes/add-question.func.php';
    $_add_pd = array();
    $_add_pd['content'] = _check_content($_POST['content']);
    $_add_pd['answer'] = $_POST['answer'];
    _query("INSERT INTO tg_question_pd(
        content,
        answer
    ) VALUES(
        '{$_add_pd['content']}',
        '{$_add_pd['answer']}'
    )");
    if (mysql_affected_rows() == 1) {
        _sql_close();
        _location('添加成功！', 'listTest.php');
    } else {
        _sql_close();
        _location('添加失败！', 'listTest.php');
    }
}
?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<html>
<link href="css/bootstrap.min.css" rel="stylesheet">



<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>添加试题</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!--你自己的样式文件 -->
<link href="css/your-style.css" rel="stylesheet">
<!-- 以下两个插件用于在IE8以及以下版本浏览器支持HTML5元素和媒体查询，如果不需要用可以移除 -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>




<body>
	<div id="wrapper">

<!-- 		<div id="main-content"> -->
<!-- 			<div id="side-bar"> -->
<!-- 				<nav> -->
<!-- 					<ul class="nav nav-tabs"> -->
<!-- 					<li class="active"><a href="#user-info" data-toggle="tab">参赛人员信息</a></li> -->
<!-- 						<li class><a href="#alert-time" data-toggle="tab">修改比赛时间</a></li> -->
<!-- 						<li class><a href="#alert-pass" data-toggle="tab">修改登录密码</a></li> --> 
<!-- 						<li class><a href="#question-bank" data-toggle="tab">管理题库</a></li> -->
					<!-- 	<li class><a href="#check-grade" data-toggle="tab">查看成绩</a></li> -->
<!-- 					</ul> -->
<!-- 				</nav> -->
<!-- 			</div> -->
			<div id="content-panel" class="tab-content">



<!-- 				<div class="tab-pane fade" id="question-bank"> -->
					
<!-- 					<div id="question-bank-left"> -->
<!-- 						<p> -->
<!-- 							<button id="button-add-question-xz" type="button" -->
<!-- 								class="btn btn-primary">>> 添加一道选择题到题库</button> -->
<!-- 						</p> -->
						<div id="add-question-xz" style="position: relative;left:70px;right:70px;margin:70px">
							<form method="post" action="doAdminAction.php"
								class="form-horizontal margin-top-20px" role="form">
								<input type="hidden" name="action" value="add-xz" />
								<div class="form-group">
									<div class="col-sm-10">
										<textarea name="content" class="form-control" rows="3"
											placeholder="题目内容..."></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10">
										<input type="text" name="mark_a" class="form-control"
											placeholder="选项 1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10">
										<input type="text" name="mark_b" class="form-control"
											placeholder="选项 2">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10">
										<input type="text" name="mark_c" class="form-control"
											placeholder="选项 3">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10">
										<input type="text" name="mark_d" class="form-control"
											placeholder="选项 4">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10">
										<label class="radio-inline"> <input type="radio" name="answer"
											value="1" checked="checked"> 1
										</label> <label class="radio-inline"> <input type="radio"
											name="answer" value="2"> 2
										</label> <label class="radio-inline"> <input type="radio"
											name="answer" value="3"> 3
										</label> <label class="radio-inline"> <input type="radio"
											name="answer" value="4"> 4
										</label>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10">
										<button type="submit" class="btn btn-primary">确认添加</button>
									</div>
								</div>
							</form>
						</div>
						<!-- <p>
							<button id="button-add-question-pd" type="button"
								class="btn btn-primary">>> 添加一道判断题到题库</button>
						</p> -->
						<div id="add-question-pd" class="hidden">
							<form method="post" action="admin.php"
								class="form-horizontal margin-top-20px" role="form">
								<input type="hidden" name="action" value="add-pd" />
								<div class="form-group">
									<div class="col-sm-10">
										<textarea name="content" class="form-control" rows="3"
											placeholder="题目内容..."></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10">
										<label class="radio-inline"> <input type="radio" name="answer"
											value="1" checked="checked"> 正确
										</label> <label class="radio-inline"> <input type="radio"
											name="answer" value="0"> 错误
										</label>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10">
										<button type="submit" class="btn btn-primary">确认添加</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!--#question-bank-left-->

				</div>

				<div class="clear"></div>
			</div>
			<!--#content-panel-->
		
	
			<? include '../lib/footer.inc.php'; ?>
		</div>


		
		<!-- 如果要使用Bootstrap的js插件，必须先调入jQuery -->
		<script src="http://libs.baidu.com/jquery/1.9.0/jquery.min.js"></script>
		<!-- 包括所有bootstrap的js插件或者可以根据需要使用的js插件调用　-->
		<script
			src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
			
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/base.js"></script>

</body>
</html>