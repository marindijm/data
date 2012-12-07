<?php
/* @var $this WaterpointsController */
/* @var $model Waterpoint */

$this->breadcrumbs=array(
	'Waterpoints'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Waterpoint', 'url'=>array('index')),
	array('label'=>'Manage Waterpoint', 'url'=>array('admin')),
);
?>

<h1>Create Waterpoint</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>