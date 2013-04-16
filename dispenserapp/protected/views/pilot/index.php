<?php
/* @var $this PilotController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pilots',
);

$this->menu=array(
	array('label'=>'Create Pilot', 'url'=>array('create')),
	array('label'=>'Manage Pilot', 'url'=>array('admin')),
);
?>

<h1>Pilots</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
