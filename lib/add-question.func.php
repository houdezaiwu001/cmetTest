<?php
/**
*====================================================
*Copy 2014 sealiu
*Author:SEALiu
*Date:2014-2-24
*/
function _check_content($_string){
	$_string=trim($_string);
	if(mb_strlen($_string,'utf-8')==0){
		_alert_back('内容不能为空!');
	}
	return _mysql_string($_string);
}

function _alert_back($_info){
    echo "<script type='text/javascript'>alert('$_info');history.back(); </script>";
    exit();
}


function _mysql_string($_string){
    if(!GPC){
        return  mysql_real_escape_string($_string);
    }else{
        return $_string;
    }
}
?>