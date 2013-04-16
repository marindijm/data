<?php
/* @var $this PilotController */
/* @var $model Pilot */

$this->breadcrumbs=array(
	'Pilots'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pilot', 'url'=>array('index')),
	array('label'=>'Create Pilot', 'url'=>array('create')),
	array('label'=>'Update Pilot', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pilot', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pilot', 'url'=>array('admin')),
);
?>

<h1>View Pilot #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'regional_office_id',
	),
)); ?>
