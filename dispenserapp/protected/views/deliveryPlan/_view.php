<?php
/* @var $this DeliveryPlanController */
/* @var $data DeliveryPlan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_plan_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->delivery_plan_id), array('view', 'id'=>$data->delivery_plan_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
	<?php echo CHtml::encode($data->end_date); ?>
	<br />


</div>