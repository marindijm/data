<?php
/* @var $this DataEntryLogController */
/* @var $model DataEntryLog */

$this->breadcrumbs=array(
	'Data Entry Logs'=>array('index'),
	$model->log_rec_id=>array('view','id'=>$model->log_rec_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Logging', 'url'=>array('index')),
	array('label'=>'Create Logging', 'url'=>array('create')),
	array('label'=>'View Logging', 'url'=>array('view', 'id'=>$model->log_rec_id)),
	array('label'=>'Manage Logging', 'url'=>array('admin')),
);
?>

<h1>Update DataEntryLog <?php echo $model->log_rec_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>