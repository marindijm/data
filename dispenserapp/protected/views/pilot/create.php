<?php
/* @var $this PilotController */
/* @var $model Pilot */

$this->breadcrumbs=array(
	'Pilots'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pilot', 'url'=>array('index')),
	array('label'=>'Manage Pilot', 'url'=>array('admin')),
);
?>

<h1>Create Pilot</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>