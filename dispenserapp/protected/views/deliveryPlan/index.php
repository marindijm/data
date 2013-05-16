<?php
/* @var $this DeliveryPlanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Delivery Plans',
);

$this->menu=array(
	array('label'=>'Create DeliveryPlan', 'url'=>array('create')),
	array('label'=>'Manage DeliveryPlan', 'url'=>array('admin')),
);
?>

<h1>Delivery Plans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
