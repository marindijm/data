<?php
/* @var $this RegionalOfficeController */
/* @var $data RegionalOffice */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('office_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->office_id), array('view', 'id'=>$data->office_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('office_name')); ?>:</b>
	<?php echo CHtml::encode($data->office_name); ?>
	<br />


</div>