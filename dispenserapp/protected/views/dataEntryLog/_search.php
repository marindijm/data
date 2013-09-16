<?php
/* @var $this DataEntryLogController */
/* @var $model DataEntryLog */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'morto_reg_no'); ?>
		<?php echo $form->textField($model,'morto_reg_no',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_refilled_to_full_tank'); ?>
		<?php echo $form->textField($model,'date_refilled_to_full_tank'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fuel_quantity'); ?>
		<?php echo $form->textField($model,'fuel_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'odometer_current_reading'); ?>
		<?php echo $form->textField($model,'odometer_current_reading'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'odometer_previous_reading'); ?>
		<?php echo $form->textField($model,'odometer_previous_reading'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kilometers_covered'); ?>
		<?php echo $form->textField($model,'kilometers_covered'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kilometers_covered_per_litre'); ?>
		<?php echo $form->textField($model,'kilometers_covered_per_litre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fuel_cost_in_kshs'); ?>
		<?php echo $form->textField($model,'fuel_cost_in_kshs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'duration_week'); ?>
		<?php echo $form->textField($model,'duration_week',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logyear'); ?>
		<?php echo $form->textField($model,'logyear'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'analysisperiod'); ?>
		<?php echo $form->textField($model,'analysisperiod'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log_rec_id'); ?>
		<?php echo $form->textField($model,'log_rec_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->