<?php
/* @var $this IssuetypesController */
/* @var $model Issuetype */

$this->breadcrumbs=array(
	'Issuetypes'=>array('index'),
	$model->issuetypeid=>array('view','id'=>$model->issuetypeid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Issuetype', 'url'=>array('index')),
	array('label'=>'Create Issuetype', 'url'=>array('create')),
	array('label'=>'View Issuetype', 'url'=>array('view', 'id'=>$model->issuetypeid)),
	array('label'=>'Manage Issuetype', 'url'=>array('admin')),
);
?>

<h1>Update Issuetype <?php echo $model->issuetypeid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>