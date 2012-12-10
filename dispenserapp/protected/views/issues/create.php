<?php
/* @var $this IssuesController */
/* @var $model Issue */

$this->breadcrumbs=array(
	'Issues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Issue', 'url'=>array('index')),
	array('label'=>'Assign Issue', 'url'=>array('assign')),
        array('label'=>'Manage Issue', 'url'=>array('admin'))    
    
);
?>

<h1>Create Issue</h1>

<?php echo $this->renderPartial('_create', array('model'=>$model)); ?>