<?php
/* @var $this IssuesController */
/* @var $model Issue */

$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->issueid,
);

include 'menuone.php';
?>

<h1>View Issue #<?php echo $model->issueid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'issueid',
		//'waterpointid',
		array('label'=>'Waterpoint', 'type'=>'raw', 'value'=>CHtml::link($model->waterpoint->waterpoint_name . ' (' . $model->waterpointid . ')', array('waterpoints/view','id'=>$model->waterpointid))),
		'date_created',
		array('label' => 'Resolved?', 'type' => 'raw', 'value' => CHtml::checkbox( $model->status, $model->status , array("disabled" =>"true"))),
		'user_assigned',
		array('label'=>'Issue Type', 'value'=>$model->issuetype->issuetypename),
		'issuesourceid',
		'createdby', 
		'resolvedby',
		'date_resolved',
		'user_comment',
	),
)); ?>

