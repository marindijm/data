<?php
/* @var $this IssuesController */
/* @var $model Issue */

$this->breadcrumbs=array(
	'Issues'=>array('index'),
	'Create',
);

include 'menuall.php';
?>

<h1>Create Issue</h1>

<?php echo $this->renderPartial('_create', array('model'=>$model)); ?>