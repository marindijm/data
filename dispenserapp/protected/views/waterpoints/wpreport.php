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

<h1>Waterpoints Count By Regional Office</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reports-grid',
	'dataProvider'=>$waterpoints_regional,
	'columns'=>array(
		'OfficeName',
		'NumOfWaterPoints',
	),
)); ?>

<h1>Waterpoints Count By Program Code</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reports-grid',
	'dataProvider'=>$waterpoints_code,
	'columns'=>array(
		'program_code',
		'count',
	),
)); ?>

