<?php
/* @var $this IssuetypesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Issuetypes',
);

$this->menu=array(
	array('label'=>'Create Issuetype', 'url'=>array('create')),
	array('label'=>'Manage Issuetype', 'url'=>array('admin')),
);
?>

<h1>Issuetypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
