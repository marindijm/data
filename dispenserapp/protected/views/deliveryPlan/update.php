<?php
/* @var $this DeliveryPlanController */
/* @var $model DeliveryPlan */

$this->breadcrumbs=array(
	'Delivery Plans'=>array('index'),
	$model->name=>array('view','id'=>$model->delivery_plan_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DeliveryPlan', 'url'=>array('index')),
	array('label'=>'Create DeliveryPlan', 'url'=>array('create')),
	array('label'=>'View DeliveryPlan', 'url'=>array('view', 'id'=>$model->delivery_plan_id)),
	array('label'=>'Manage DeliveryPlan', 'url'=>array('admin')),
);
?>

<h1>Update DeliveryPlan <?php echo $model->delivery_plan_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>