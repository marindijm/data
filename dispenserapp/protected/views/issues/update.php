<?php
/* @var $this IssuesController */
/* @var $model Issue */

$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->issueid=>array('view','id'=>$model->issueid),
	'Update',
);

include 'menuone.php';
?>

<h1>Update Issue <?php echo $model->issueid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>