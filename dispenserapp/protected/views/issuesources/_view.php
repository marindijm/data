<?php
/* @var $this IssuesourcesController */
/* @var $data Issuesource */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('issuesourceid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->issuesourceid), array('view', 'id'=>$data->issuesourceid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issuesource')); ?>:</b>
	<?php echo CHtml::encode($data->issuesource); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>