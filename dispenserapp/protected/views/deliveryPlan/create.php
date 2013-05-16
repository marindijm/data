<?php
/* @var $this DeliveryPlanController */
/* @var $model DeliveryPlan */

$this->breadcrumbs=array(
	'Delivery Plans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DeliveryPlan', 'url'=>array('index')),
	array('label'=>'Manage DeliveryPlan', 'url'=>array('admin')),
);
?>

<h1>Create DeliveryPlan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>