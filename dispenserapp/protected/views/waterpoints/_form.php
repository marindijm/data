<?php
/* @var $this WaterpointsController */
/* @var $model Waterpoint */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'waterpoint-form',
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
		<?php echo $form->labelEx($model,'waterpoint_name'); ?>
		<?php echo $form->textField($model,'waterpoint_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'waterpoint_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'district_name'); ?>
		<?php echo $form->textField($model,'district_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'district_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'division_name'); ?>
		<?php echo $form->textField($model,'division_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'division_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location_name'); ?>
		<?php echo $form->textField($model,'location_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'location_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'directions'); ?>
		<?php echo $form->textField($model,'directions',array('size'=>60,'maxlength'=>20000)); ?>
		<?php echo $form->error($model,'directions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'promoter'); ?>
		<?php echo $form->textField($model,'promoter',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'promoter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'promoter_contact_1'); ?>
		<?php echo $form->textField($model,'promoter_contact_1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'promoter_contact_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'promoter_contact_2'); ?>
		<?php echo $form->textField($model,'promoter_contact_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'promoter_contact_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'assistant_promoter'); ?>
		<?php echo $form->textField($model,'assistant_promoter',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'assistant_promoter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'assistant_promoter_contact_1'); ?>
		<?php echo $form->textField($model,'assistant_promoter_contact_1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'assistant_promoter_contact_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'assistant_promoter_contact_2'); ?>
		<?php echo $form->textField($model,'assistant_promoter_contact_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'assistant_promoter_contact_2'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->