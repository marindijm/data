<?php
/* @var $this DeliveryController */
/* @var $model Delivery */

$this->breadcrumbs=array(
	'Deliveries'=>array('index'),
	$model->delivery_id=>array('view','id'=>$model->delivery_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Delivery', 'url'=>array('index')),
	array('label'=>'Create Delivery', 'url'=>array('create')),
	array('label'=>'View Delivery', 'url'=>array('view', 'id'=>$model->delivery_id)),
	array('label'=>'Manage Delivery', 'url'=>array('admin')),
);
?>

<h1>Update Delivery <?php echo $model->delivery_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>