<?php
/* @var $this IssuesController */
/* @var $model Issue */

$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->issueid=>array('view','id'=>$model->issueid),
	'Assign',
);

include 'menuone.php';
?>

<h1>Assign Issue <?php echo $model->issueid; ?> to User</h1>

<?php echo $this->renderPartial('_assign', array('model'=>$model)); ?>