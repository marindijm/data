<?php
/* @var $this IssuesController */
/* @var $model Issue */

$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->issueid=>array('view','id'=>$model->issueid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Issue', 'url'=>array('index')),
	array('label'=>'Create Issue', 'url'=>array('create')),
	array('label'=>'View Issue', 'url'=>array('view', 'id'=>$model->issueid)),
	array('label'=>'Manage Issue', 'url'=>array('admin')),
);
?>

<h1>Update Issue <?php echo $model->issueid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>