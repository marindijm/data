<?php
/* @var $this IssuesController */
/* @var $model Issue */

$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->issueid=>array('view','id'=>$model->issueid),
	'Resolve',
);

include 'menuone.php';
?>

<h1>Resolve Issue <?php echo $model->issueid; ?></h1>

<?php echo $this->renderPartial('_resolve', array('model'=>$model)); ?>