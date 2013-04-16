<?php
/* @var $this IssuetypesController */
/* @var $model Issuetype */

$this->breadcrumbs=array(
	'Issuetypes'=>array('index'),
	$model->issuetypeid,
);

$this->menu=array(
	array('label'=>'List Issuetype', 'url'=>array('index')),
	array('label'=>'Create Issuetype', 'url'=>array('create')),
	array('label'=>'Update Issuetype', 'url'=>array('update', 'id'=>$model->issuetypeid)),
	array('label'=>'Delete Issuetype', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->issuetypeid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Issuetype', 'url'=>array('admin')),
);
?>

<h1>View Issuetype #<?php echo $model->issuetypeid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'issuetypeid',
		'issuetypename',
	),
)); ?>
