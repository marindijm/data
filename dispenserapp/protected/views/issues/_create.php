<?php
/* @var $this IssuesController */
/* @var $model Issue */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'issue-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

<link href="css/jquery-ui-1.9.2.custom.min.css" rel="stylesheet"> 
<link href="css/ui.jqgrid.css" rel="stylesheet">
<script src="js_funcs/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="js_funcs/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
<script src="js_funcs/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="js_funcs/grid.locale-en.js" type="text/javascript"></script> 
<script type="text/javascript"> 
$(document).ready(function() { 
$("#list1").jqGrid({
    url:'server.php',
	datatype: "json",
	 width:900,
    height:250,
   	colNames:['Waterpoint ID','Waterpoint Name','Program Code','District Name','Division Name','Location Name','Sublocation Name', 'Village Name'],
   	colModel:[
   		{name:'wptid',index:'wptid', width:45, sorttype:'int'},
   		{name:'wptname',index:'wptname', width:90},
   		{name:'pcode',index:'pcode', width:50},
   		{name:'dname',index:'dname', width:80, align:"right"},
   		{name:'dvname',index:'dvname', width:80, align:"right"},		
   		{name:'lname',index:'lname', width:80,align:"right"}	
		{name:'subloc',index:'lname', width:80,align:"right"}	
		{name:'vill',index:'lname', width:80,align:"right"}	
   	],
    rowNum:10,
	rowTotal: 3142,
	rowList : [10,20,30],
	loadonce:true,
   	mtype: "GET",
	rownumbers: true,
	rownumWidth: 40,  
	gridview: true,
	pager: '#pager1',
   	sortname: 'wptid',	
    viewrecords: true,
    sortorder: "asc",
    caption:"DSW Waterpoints"
});
$("#list1").jqGrid('navGrid','#pager1',{del:false,add:false,edit:false});

$("#a1").click( function(){
	var id = $("#list1").jqGrid('getGridParam','selrow');
	if (id)	{
		var ret = $("#list1").jqGrid('getRowData',id);
	//	alert("watrepoint id="+ret.wptid+" waterpoint name="+ret.wptname+"...");
	$('#wptid').val(ret.wptid);
	$('#dialog').dialog('close');
		 return false; 
	} else 
	{// alert("Please select row");}
	
	}
	
	 
});
$('div#dialog').dialog({ autoOpen: false })
	 $('a#dialog_link').click(function() { 
	  $('#dialog').dialog( "option", "width", 920 );
		  $('#dialog').dialog('open'); 
		  return false; 
	  });

});

			
</script> 


 <div id="dialog" title="Select Waterpoint" style="display:none"> 
	 <table id="list1"></table>
	<div id="pager1"></div>
	<a href="" id="a1">Get Selected Waterpoint</a>
 </div>  
   <a href="#" id="dialog_link">Select Waterpoint</a>  

	<?php echo $form->errorSummary($model); ?>
	



	<div class="row">
		<?php echo $form->labelEx($model,'waterpointid'); ?>
	
		<?php echo $form->textField($model,'waterpointid',array('readonly'=>true,'id'=>'wptid')); ?>
		<?php echo $form->error($model,'waterpointid'); ?>
	</div>
   
        <div class="row">
		<?php echo $form->labelEx($model,'dispenser_functional'); ?>
	
		<?php echo $form->checkBox($model,'dispenser_functional'); ?>
                                 
		<?php echo $form->error($model,'dispenser_functional'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issuetypeid'); ?>
		<?php echo $form->dropDownList($model,'issuetypeid', CHtml::listData(Issuetype::model()->findAll(), 'issuetypeid', 'issuetypename')); ?>
		<?php echo $form->error($model,'issuetypeid'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'user_comments'); ?>
		<?php echo $form->textArea($model,'user_comments',array('rows'=>4, 'cols'=>50)); ?>
		<?php echo $form->error($model,'user_comments'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->