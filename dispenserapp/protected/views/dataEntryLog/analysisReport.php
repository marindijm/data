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

<h1>Mortocycle Summary Report</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reports-grid',
	'dataProvider'=>$allAnalysis,
	'columns'=>array(
		'morto_reg_no',
		'analysisperiod',
		'maint',
		'fcost',
		'tcost',
		'kmcovered',
		'fconsumed',
		'kmperlitre',
		'shsperlitre',
	),
)); 
?>