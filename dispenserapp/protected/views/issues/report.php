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

<h1>Most Common Issues</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reports-grid',
	'dataProvider'=>$common_issues,
	'columns'=>array(
		'IssueType',
		'frequency',
	),
)); ?>

<h1>Most Common Issues By Regional Office</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reports-grid',
	'dataProvider'=>$common_issues_by_office,
	'columns'=>array(
		'Region',
		'IssueType',
		'Frequency',
	),
)); ?>

<h1>Average Days To Resolve Issue</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reports-grid',
	'dataProvider'=>$averageDays,
	'columns'=>array(
		'IssueType',
		'AvgNumDays',
	),
)); ?>

<h1>Average Days To Resolve Issue By Office</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reports-grid',
	'dataProvider'=>$averageDaysOffice,
	'columns'=>array(
		'Region',
		'IssueType',
		'AvgNumDays',
	),
)); ?>