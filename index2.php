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


<h1>Orders</h1>

<table class="table table-striped" <thead>
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
        <tr data-toggle="modal" data-id="1" data-target="#orderModal" >
            <td>1</td>
            <td>24234234</td>
            <td>A</td>
        </tr>
        <tr data-toggle="modal" data-id="2" data-target="#orderModal" >
            <td>2</td>
            <td>24234234</td>
            <td>A</td>
        </tr>
        <tr data-toggle="modal" data-id="3" data-target="#orderModal" >
            <td>3</td>
            <td>24234234</td>
            <td>A</td>
        </tr>
    </tbody>
</table>
<div id="orderModal" class="modal hide fade" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
         <h3>Order</h3>

    </div>
    <div id="orderDetails" class="modal-body"></div>
    <div id="orderItems" class="modal-body"></div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

<script type="text/javascript">
$(function test(){
    $('#orderModal').modal({
        keyboard: true,
        backdrop: "static",
        show:false,
        
    }).on('show', function(){
          var getIdFromRow = $(event.target).closest('tr').data('id');
        //make your ajax call populate items or what even you need
        $(this).find('#orderDetails').html($('<b> Order Id selected: ' + getIdFromRow  + '</b>'))
    });
});
</script>

</html>














