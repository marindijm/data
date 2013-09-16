<?php
/* @var $this DataEntryLogController */
/* @var $data DataEntryLog */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_rec_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->log_rec_id), array('view', 'id'=>$data->log_rec_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('morto_reg_no')); ?>:</b>
	<?php echo CHtml::encode($data->morto_reg_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_refilled_to_full_tank')); ?>:</b>
	<?php echo CHtml::encode($data->date_refilled_to_full_tank); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuel_quantity')); ?>:</b>
	<?php echo CHtml::encode($data->fuel_quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('odometer_current_reading')); ?>:</b>
	<?php echo CHtml::encode($data->odometer_current_reading); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('odometer_previous_reading')); ?>:</b>
	<?php echo CHtml::encode($data->odometer_previous_reading); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kilometers_covered')); ?>:</b>
	<?php echo CHtml::encode($data->kilometers_covered); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('kilometers_covered_per_litre')); ?>:</b>
	<?php echo CHtml::encode($data->kilometers_covered_per_litre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuel_cost_in_kshs')); ?>:</b>
	<?php echo CHtml::encode($data->fuel_cost_in_kshs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duration_week')); ?>:</b>
	<?php echo CHtml::encode($data->duration_week); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logyear')); ?>:</b>
	<?php echo CHtml::encode($data->logyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('analysisperiod')); ?>:</b>
	<?php echo CHtml::encode($data->analysisperiod); ?>
	<br />

	*/ ?>

</div>