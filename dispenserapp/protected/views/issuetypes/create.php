<?php
/* @var $this IssuetypesController */
/* @var $model Issuetype */

$this->breadcrumbs=array(
	'Issuetypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Issuetype', 'url'=>array('index')),
	array('label'=>'Manage Issuetype', 'url'=>array('admin')),
);
?>

<h1>Create Issuetype</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>