<?php
/* @var $this WaterpointsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Waterpoints',
);

$this->menu=array(
	array('label'=>'Create Waterpoint', 'url'=>array('create')),
	array('label'=>'Manage Waterpoint', 'url'=>array('admin')),
);
?>

<h1>Waterpoints</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
