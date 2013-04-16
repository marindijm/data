<?php
/* @var $this IssuesourcesController */
/* @var $model Issuesource */

$this->breadcrumbs=array(
	'Issuesources'=>array('index'),
	$model->issuesourceid=>array('view','id'=>$model->issuesourceid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Issuesource', 'url'=>array('index')),
	array('label'=>'Create Issuesource', 'url'=>array('create')),
	array('label'=>'View Issuesource', 'url'=>array('view', 'id'=>$model->issuesourceid)),
	array('label'=>'Manage Issuesource', 'url'=>array('admin')),
);
?>

<h1>Update Issuesource <?php echo $model->issuesourceid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>