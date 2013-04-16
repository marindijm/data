<?php
/* @var $this PilotController */
/* @var $model Pilot */

$this->breadcrumbs=array(
	'Pilots'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pilot', 'url'=>array('index')),
	array('label'=>'Create Pilot', 'url'=>array('create')),
	array('label'=>'View Pilot', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pilot', 'url'=>array('admin')),
);
?>

<h1>Update Pilot <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>