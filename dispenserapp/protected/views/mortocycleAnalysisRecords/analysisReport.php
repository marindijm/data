<?php
/* @var $this DeliveryController */
/* @var $model Delivery */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('delivery-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php include 'menuall.php'; ?>

<h3>Mortocycle Summary Report</h3>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reports-grid',
	'dataProvider'=>$allAnalysis,
	'columns'=>array(
		'morto_reg_no',
		'analysisperiod',		
		array('header'=>'Maintenance Cost (Kshs)','value'=>function($dataProvider){return number_format($dataProvider->maint, 2);},),
		array('header'=>'Fuel Cost (Kshs)','value'=>function($dataProvider){return number_format($dataProvider->fcost, 2);},),
		array('header'=>'Total Cost (Kshs)','value'=>function($dataProvider){return number_format($dataProvider->tcost, 2);},),
		array('header'=>'Distance Covered (Kms)','value'=>function($dataProvider){return number_format($dataProvider->kmcovered, 2);},),
		array('header'=>'Fuel Usage (Lts)','value'=>function($dataProvider){return number_format($dataProvider->fconsumed, 2);},),
		array('header'=>'Distance Covered Per Litre (Kms)','value'=>function($dataProvider){return number_format($dataProvider->kmperlitre, 2);},),
		array('header'=>'Cost Per Kilometer (Kshs)','value'=>function($dataProvider){return number_format($dataProvider->shsperlitre, 2);},),
	),
)); 
?>