<?php
/* @var $this DataEntryLogController */
/* @var $model DataEntryLog */

$this->breadcrumbs=array(
	'Data Entry Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Logging', 'url'=>array('index')),
	array('label'=>'Manage Logging', 'url'=>array('admin')),
);
?>

<h1>Create DataEntryLog</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>