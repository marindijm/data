<?php
/* @var $this WaterpointsController */
/* @var $data Waterpoint */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('waterpoint_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->waterpoint_id), array('view', 'id'=>$data->waterpoint_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waterpoint_name')); ?>:</b>
	<?php echo CHtml::encode($data->waterpoint_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('district_name')); ?>:</b>
	<?php echo CHtml::encode($data->district_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('division_name')); ?>:</b>
	<?php echo CHtml::encode($data->division_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_name')); ?>:</b>
	<?php echo CHtml::encode($data->location_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('directions')); ?>:</b>
	<?php echo CHtml::encode($data->directions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promoter')); ?>:</b>
	<?php echo CHtml::encode($data->promoter); ?>
	<br />	
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('promoter_contact_1')); ?>:</b>
	<?php echo CHtml::encode($data->promoter_contact_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promoter_contact_2')); ?>:</b>
	<?php echo CHtml::encode($data->promoter_contact_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assistant_promoter')); ?>:</b>
	<?php echo CHtml::encode($data->assistant_promoter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assistant_promoter_contact_1')); ?>:</b>
	<?php echo CHtml::encode($data->assistant_promoter_contact_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assistant_promoter_contact_2')); ?>:</b>
	<?php echo CHtml::encode($data->assistant_promoter_contact_2); ?>
	<br />

	*/ ?>

</div>