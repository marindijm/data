<?php
/* @var $this WaterpointsController */
/* @var $model Waterpoint */

$this->breadcrumbs=array(
	'Waterpoints'=>array('index'),
	$model->waterpoint_id=>array('view','id'=>$model->waterpoint_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Waterpoint', 'url'=>array('index')),
	array('label'=>'Create Waterpoint', 'url'=>array('create')),
	array('label'=>'View Waterpoint', 'url'=>array('view', 'id'=>$model->waterpoint_id)),
	array('label'=>'Manage Waterpoint', 'url'=>array('admin')),
);
?>

<h1>Update Waterpoint <?php echo $model->waterpoint_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>