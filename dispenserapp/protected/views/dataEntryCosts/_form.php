<?php
/* @var $this DataEntryCostsController */
/* @var $model DataEntryCosts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'data-entry-costs-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'reg_no'); ?>
		<?php echo $form->textField($model,'reg_no',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'reg_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_date'); ?>
		<?php echo $form->textField($model,'service_date'); ?>
		<?php echo $form->error($model,'service_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oil_lubricant_type'); ?>
		<?php echo $form->textField($model,'oil_lubricant_type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'oil_lubricant_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oil_lubricant_quantity'); ?>
		<?php echo $form->textField($model,'oil_lubricant_quantity'); ?>
		<?php echo $form->error($model,'oil_lubricant_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oil_lubricant_total_cost'); ?>
		<?php echo $form->textField($model,'oil_lubricant_total_cost'); ?>
		<?php echo $form->error($model,'oil_lubricant_total_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'outsource_material'); ?>
		<?php echo $form->textField($model,'outsource_material',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'outsource_material'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'outsource_material_cost'); ?>
		<?php echo $form->textField($model,'outsource_material_cost'); ?>
		<?php echo $form->error($model,'outsource_material_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'outsource_labour_total_cost'); ?>
		<?php echo $form->textField($model,'outsource_labour_total_cost'); ?>
		<?php echo $form->error($model,'outsource_labour_total_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description_of_ourtsource_work_performed'); ?>
		<?php echo $form->textArea($model,'description_of_ourtsource_work_performed',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description_of_ourtsource_work_performed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'odometer_reading'); ?>
		<?php echo $form->textField($model,'odometer_reading'); ?>
		<?php echo $form->error($model,'odometer_reading'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'duration_week'); ?>
		<?php echo $form->textField($model,'duration_week',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'duration_week'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'costyear'); ?>
		<?php echo $form->textField($model,'costyear'); ?>
		<?php echo $form->error($model,'costyear'); ?>
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