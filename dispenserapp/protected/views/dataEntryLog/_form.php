<?php
/* @var $this DataEntryLogController */
/* @var $model DataEntryLog */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'data-entry-log-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'morto_reg_no'); ?>
		<?php echo $form->textField($model,'morto_reg_no',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'morto_reg_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_refilled_to_full_tank'); ?>
		<?php echo $form->textField($model,'date_refilled_to_full_tank'); ?>
		<?php echo $form->error($model,'date_refilled_to_full_tank'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fuel_quantity'); ?>
		<?php echo $form->textField($model,'fuel_quantity'); ?>
		<?php echo $form->error($model,'fuel_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'odometer_current_reading'); ?>
		<?php echo $form->textField($model,'odometer_current_reading'); ?>
		<?php echo $form->error($model,'odometer_current_reading'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'odometer_previous_reading'); ?>
		<?php echo $form->textField($model,'odometer_previous_reading'); ?>
		<?php echo $form->error($model,'odometer_previous_reading'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kilometers_covered'); ?>
		<?php echo $form->textField($model,'kilometers_covered'); ?>
		<?php echo $form->error($model,'kilometers_covered'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kilometers_covered_per_litre'); ?>
		<?php echo $form->textField($model,'kilometers_covered_per_litre'); ?>
		<?php echo $form->error($model,'kilometers_covered_per_litre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fuel_cost_in_kshs'); ?>
		<?php echo $form->textField($model,'fuel_cost_in_kshs'); ?>
		<?php echo $form->error($model,'fuel_cost_in_kshs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'duration_week'); ?>
		<?php echo $form->textField($model,'duration_week',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'duration_week'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logyear'); ?>
		<?php echo $form->textField($model,'logyear'); ?>
		<?php echo $form->error($model,'logyear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'analysisperiod'); ?>
		<?php echo $form->textField($model,'analysisperiod'); ?>
		<?php echo $form->error($model,'analysisperiod'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->