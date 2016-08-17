<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta charset='utf-8'></meta>
<html xmlns="http://www.w3.org/1999/xhtml">
<head jwcid="@wade:Head" >
<meta http-equiv="Content-Type" content="text/html; charset=gbk"/>
<title>存量用户导入</title>
<!-- --><link jwcid="@wade:Style" href="component/styles/styles_all.css" rel="stylesheet" type="text/css" media="screen"/>
<link jwcid="@wade:Style" href="component/styles/styles_content.css" rel="stylesheet" type="text/css" media="screen"/>

<!-- Bootstrap core CSS -->
<link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
<script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>

<script jwcid="@wade:Script" type="text/javascript" src="scripts/program/programSale.js"></script>

</head>
<body jwcid="@Body">
  <form jwcid="@Form" enctype="multipart/form-data">
    <div class="popwrapper">

      <div class="alert alert-warning" role="alert" id="tishi" style="display:none">文件正在入库处理中,请耐心等候...,在弹出提示前请不要关闭页面!谢谢.</div>

      <div class="alert alert-info" role="alert">请上传要导入的数据文件</div>

      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title" style="font-size: 14px">插入类型</h3>
        </div>
        <div class="panel-body">
          <select name="queryType" id="queryType">
            <option value="0">实时</option>
            <option value="1">模拟</option>
          </select>
        </div>
      </div>

      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title" style="font-size: 14px">导入TXT文件</h3>
        </div>
        <div class="panel-body">
          <a class="btn-xs" href="attach?file_name=TXT模板及说明.rar&file_path=/salemanm_templet/basicupload/NumberTemplateDescription.rar" target="printframe">导入文件模版</a> <input
            type="file" id="FILE_PATH_TXT" name="FILE_PATH_TXT" desc="导入文件" class="一行数据" /> <br>

            <table border=0>
              <tr>
                <td style="PADDING: 10px;"><input type="submit" class="btn btn-sm btn-info" jwcid="aquery@Submit" value="  导入  " listener="ognl:listeners.dataImportByTxt"
                  onclick="if(getFileSize(document.all('FILE_PATH_TXT').value)){return confirmForm(this)}else{return false;};" /></td>
                <td>
                  <div class="alert alert-danger" style="padding: 5px;margin-bottom: 0px;display: none;" id="file_warning" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> 请先选择需要上传的文件
                  </div>
                </td>
              </tr>
            </table>
          </div>
      </div>
      
      <span jwcid="@wade:PageData" />
      </div>
  </form>

  <script>
  	function slideStatus() {
  		if ($("#tishi").is(":hidden")) {
  			$("#tishi").slideDown("slow");
  		} else {
  			$("#tishi").hide();
  		}
  	}
  	
  	function slideWarning()
  	{
  		$("#file_warning").slideDown("slow");
  	}
  
  	function getFileSize(filename) {
  		// var filename = document.all('FILE_PATH').value; //获得上传文件的物理路径
  		if (filename == '') {
  			slideWarning();
  			return false;
  
  		} else {
  			var strRegex = "(.txt)$"; //用于验证扩展名的正则表达式
  			var re = new RegExp(strRegex);
  			if (!re.test(filename.toLowerCase())) {
  				alert("文件名不合法,文件的扩展名必须为.txt格式");
  				slideStatus();
  
  				return false;
  			} else {
  				return true;
  			}
  		}
  	}
  </script>
</body>
</html>