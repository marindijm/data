<?php
/* @var $this DeliveryController */
/* @var $model Delivery */

$this->breadcrumbs=array(
	'Deliveries'=>array('index'),
	$model->delivery_id,
);

$this->menu=array(
	array('label'=>'List Delivery', 'url'=>array('index')),
	array('label'=>'Create Delivery', 'url'=>array('create')),
	array('label'=>'Update Delivery', 'url'=>array('update', 'id'=>$model->delivery_id)),
	array('label'=>'Delete Delivery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->delivery_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Delivery', 'url'=>array('admin')),
);
?>

<h1>View Delivery #<?php echo $model->delivery_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'delivery_id',
		'waterpoint_id',
		'staff_id',
		'delivery_plan_id',
		'delivery_date',
		'complete',
		'num_jerricans',
		'person_delivered_to',
		'contact_person_delivered_to',
		'title_person_delivered_to',
		'chlorine_consumed',
		'chlorine_in_stock',
		'last_expiry_date',
	),
)); ?>
