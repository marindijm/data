<?php
/* @var $this IssuetypesController */
/* @var $data Issuetype */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('issuetypeid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->issuetypeid), array('view', 'id'=>$data->issuetypeid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issuetypename')); ?>:</b>
	<?php echo CHtml::encode($data->issuetypename); ?>
	<br />


</div>