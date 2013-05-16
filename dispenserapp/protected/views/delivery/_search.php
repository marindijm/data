<?php
/* @var $this DeliveryController */
/* @var $model Delivery */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'delivery_id'); ?>
		<?php echo $form->textField($model,'delivery_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'waterpoint_id'); ?>
		<?php echo $form->textField($model,'waterpoint_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'staff_id'); ?>
		<?php echo $form->textField($model,'staff_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_plan_id'); ?>
		<?php echo $form->textField($model,'delivery_plan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_date'); ?>
		<?php echo $form->textField($model,'delivery_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'complete'); ?>
		<?php echo $form->checkBox($model,'complete'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_jerricans'); ?>
		<?php echo $form->textField($model,'num_jerricans'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_delivered_to'); ?>
		<?php echo $form->textField($model,'person_delivered_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_person_delivered_to'); ?>
		<?php echo $form->textField($model,'contact_person_delivered_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title_person_delivered_to'); ?>
		<?php echo $form->textField($model,'title_person_delivered_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chlorine_consumed'); ?>
		<?php echo $form->textField($model,'chlorine_consumed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chlorine_in_stock'); ?>
		<?php echo $form->textField($model,'chlorine_in_stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_expiry_date'); ?>
		<?php echo $form->textField($model,'last_expiry_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->