<?php
/* @var $this IssuesourcesController */
/* @var $model Issuesource */

$this->breadcrumbs=array(
	'Issuesources'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Issuesource', 'url'=>array('index')),
	array('label'=>'Manage Issuesource', 'url'=>array('admin')),
);
?>

<h1>Create Issuesource</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>