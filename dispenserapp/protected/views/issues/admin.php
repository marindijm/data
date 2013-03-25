<?php
/* @var $this IssuesController */
/* @var $model Issue */

$this->breadcrumbs=array(
	'Issues'=>array('index'),
	'Manage',
);

include 'menuall.php';

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('issue-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Issues</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'issue-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'issueid',
		//'waterpointid',
		array('name'=>'waterpointid', 'type'=>'raw', 'value'=>'CHtml::link( ($data->waterpoint->waterpoint_name . " (" . $data->waterpointid . ")") , array("waterpoints/view", "id"=>$data->waterpointid))', 'header'=>'Waterpoint'),
		'date_created',
		array('name' => 'status', 'type' => 'raw', 'value' => 'CHtml::checkbox( $data->status, $data->status , array("disabled" =>"true"))', 'header' => 'Resolved?'),
		'user_assigned',
		//'issuetypeid',
		array('name'=>'issuetypeid', 'header'=>'Issue Type', 'value'=>'$data->issuetype->issuetypename'),
		/*
		'issuesourceid',
		'createdby',
		'resolvedby',
		*/
		'date_resolved',
		array('name'=>'issuetypeid', 'header'=>'Regional Office', 'value'=>'$data->waterpoint->region->office_name'),
		'dispenser_functional',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
