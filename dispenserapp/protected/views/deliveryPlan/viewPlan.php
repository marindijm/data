<?php
/* @var $this DeliveryPlanController */
/* @var $model DeliveryPlan */

$this->breadcrumbs=array(
	'Delivery Plans'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List DeliveryPlan', 'url'=>array('index')),
	array('label'=>'Create DeliveryPlan', 'url'=>array('create')),
	array('label'=>'Update DeliveryPlan', 'url'=>array('update', 'id'=>$model->delivery_plan_id)),
	array('label'=>'Delete DeliveryPlan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->delivery_plan_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DeliveryPlan', 'url'=>array('admin')),
);
?>

<h3><?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'delivery_plan_id',
		'name',
		'start_date',
		'end_date',
	),
)); ?>

<?php echo $deliveries ?>

<h3> Deliveries For <?php echo $model->name; ?> </h3>
<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'deliveries-grid',
    'dataProvider' => $dataProvider,
    'columns' => array(
		'delivery_plan_id',
		'waterpoint_id',
		'staff_id',
        'delivery_date',
		'complete',
		'num_jerricans'
   ),
));
?>