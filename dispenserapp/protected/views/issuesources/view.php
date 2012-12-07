<?php
/* @var $this IssuesourcesController */
/* @var $model Issuesource */

$this->breadcrumbs=array(
	'Issuesources'=>array('index'),
	$model->issuesourceid,
);

$this->menu=array(
	array('label'=>'List Issuesource', 'url'=>array('index')),
	array('label'=>'Create Issuesource', 'url'=>array('create')),
	array('label'=>'Update Issuesource', 'url'=>array('update', 'id'=>$model->issuesourceid)),
	array('label'=>'Delete Issuesource', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->issuesourceid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Issuesource', 'url'=>array('admin')),
);
?>

<h1>View Issuesource #<?php echo $model->issuesourceid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'issuesourceid',
		'issuesource',
		'description',
	),
)); ?>
