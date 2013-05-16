<?php
/* @var $this DeliveryController */
/* @var $model Delivery */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'delivery-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'waterpoint_id'); ?>
		<?php echo $form->textField($model,'waterpoint_id'); ?>
		<?php echo $form->error($model,'waterpoint_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'staff_id'); ?>
		<?php echo $form->textField($model,'staff_id'); ?>
		<?php echo $form->error($model,'staff_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delivery_plan_id'); ?>
		<?php echo $form->textField($model,'delivery_plan_id'); ?>
		<?php echo $form->error($model,'delivery_plan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delivery_date'); ?>
		<?php echo $form->textField($model,'delivery_date'); ?>
		<?php echo $form->error($model,'delivery_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'complete'); ?>
		<?php echo $form->checkBox($model,'complete'); ?>
		<?php echo $form->error($model,'complete'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_jerricans'); ?>
		<?php echo $form->textField($model,'num_jerricans'); ?>
		<?php echo $form->error($model,'num_jerricans'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_delivered_to'); ?>
		<?php echo $form->textField($model,'person_delivered_to'); ?>
		<?php echo $form->error($model,'person_delivered_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_person_delivered_to'); ?>
		<?php echo $form->textField($model,'contact_person_delivered_to'); ?>
		<?php echo $form->error($model,'contact_person_delivered_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title_person_delivered_to'); ?>
		<?php echo $form->textField($model,'title_person_delivered_to'); ?>
		<?php echo $form->error($model,'title_person_delivered_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chlorine_consumed'); ?>
		<?php echo $form->textField($model,'chlorine_consumed'); ?>
		<?php echo $form->error($model,'chlorine_consumed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chlorine_in_stock'); ?>
		<?php echo $form->textField($model,'chlorine_in_stock'); ?>
		<?php echo $form->error($model,'chlorine_in_stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_expiry_date'); ?>
		<?php echo $form->textField($model,'last_expiry_date'); ?>
		<?php echo $form->error($model,'last_expiry_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->