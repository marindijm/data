<?php
/* @var $this DataEntryCostsController */
/* @var $data DataEntryCosts */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cost_rec_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cost_rec_id), array('view', 'id'=>$data->cost_rec_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reg_no')); ?>:</b>
	<?php echo CHtml::encode($data->reg_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_date')); ?>:</b>
	<?php echo CHtml::encode($data->service_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oil_lubricant_type')); ?>:</b>
	<?php echo CHtml::encode($data->oil_lubricant_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oil_lubricant_quantity')); ?>:</b>
	<?php echo CHtml::encode($data->oil_lubricant_quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oil_lubricant_total_cost')); ?>:</b>
	<?php echo CHtml::encode($data->oil_lubricant_total_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('outsource_material')); ?>:</b>
	<?php echo CHtml::encode($data->outsource_material); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('outsource_material_cost')); ?>:</b>
	<?php echo CHtml::encode($data->outsource_material_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('outsource_labour_total_cost')); ?>:</b>
	<?php echo CHtml::encode($data->outsource_labour_total_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_of_ourtsource_work_performed')); ?>:</b>
	<?php echo CHtml::encode($data->description_of_ourtsource_work_performed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('odometer_reading')); ?>:</b>
	<?php echo CHtml::encode($data->odometer_reading); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duration_week')); ?>:</b>
	<?php echo CHtml::encode($data->duration_week); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('costyear')); ?>:</b>
	<?php echo CHtml::encode($data->costyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('analysisperiod')); ?>:</b>
	<?php echo CHtml::encode($data->analysisperiod); ?>
	<br />

	*/ ?>

</div>