<?php
/* @var $this DeliveryController */
/* @var $data Delivery */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->delivery_id), array('view', 'id'=>$data->delivery_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waterpoint_id')); ?>:</b>
	<?php echo CHtml::encode($data->waterpoint_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('staff_id')); ?>:</b>
	<?php echo CHtml::encode($data->staff_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_plan_id')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_plan_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_date')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('complete')); ?>:</b>
	<?php echo CHtml::encode($data->complete); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_jerricans')); ?>:</b>
	<?php echo CHtml::encode($data->num_jerricans); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('person_delivered_to')); ?>:</b>
	<?php echo CHtml::encode($data->person_delivered_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_person_delivered_to')); ?>:</b>
	<?php echo CHtml::encode($data->contact_person_delivered_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_person_delivered_to')); ?>:</b>
	<?php echo CHtml::encode($data->title_person_delivered_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chlorine_consumed')); ?>:</b>
	<?php echo CHtml::encode($data->chlorine_consumed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chlorine_in_stock')); ?>:</b>
	<?php echo CHtml::encode($data->chlorine_in_stock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_expiry_date')); ?>:</b>
	<?php echo CHtml::encode($data->last_expiry_date); ?>
	<br />

	*/ ?>

</div>