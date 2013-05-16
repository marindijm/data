<?php
/* @var $this DeliveryController */
/* @var $model Delivery */

$this->breadcrumbs=array(
	'Deliveries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Delivery', 'url'=>array('index')),
	array('label'=>'Manage Delivery', 'url'=>array('admin')),
);
?>

<h1>Create Delivery</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>