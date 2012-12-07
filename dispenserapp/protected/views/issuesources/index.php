<?php
/* @var $this IssuesourcesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Issuesources',
);

$this->menu=array(
	array('label'=>'Create Issuesource', 'url'=>array('create')),
	array('label'=>'Manage Issuesource', 'url'=>array('admin')),
);
?>

<h1>Issuesources</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
